<?php

namespace App\Http\Livewire\LeaveConfig;

use Livewire\Component;
use App\Models\LeaveConfig;

class LeaveConfigListForm extends Component
{
    public $idKey = 0;
    public $leav_code;
    public $leav_name;
    public $leav_status = 1;

    protected $listeners = [
        'editLeaveConfig' => 'edit',
        'btnCreateLeaveConfig' => 'resetInput'
    ];

    protected $rules = [
        'leav_code' => 'required',
        'leav_name' => 'required'
    ];

    protected $messages = [
        'leav_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'leav_name.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('leav_code');
        $this->reset('leav_name');
        $this->reset('leav_status');
    }

    public function edit($id)
    {
        $leav = LeaveConfig::findOrFail($id);
        $this->idKey = $leav->id;
        $this->leav_code = $leav->leav_code;
        $this->leav_name = $leav->leav_name;
        $this->leav_status = $leav->leav_status;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        LeaveConfig::updateOrCreate([
            'id' => $this->idKey
        ],[
            'leav_code' => $this->leav_code,
            'leav_name' => $this->leav_name,
            'leav_status' => $this->leav_status
        ]);
        $this->resetInput();
        $this->emit("refreshLeaveConfig");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.leave-config.leave-config-list-form');
    }
}
