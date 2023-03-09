<?php

namespace App\Http\Livewire\MachineGroup;

use Livewire\Component;
use App\Models\MachineGroup;

class MachineGroupForm extends Component
{
    public $idKey = 0;
    public $gruo_code;
    public $gruo_name;
    public $gruo_status = 1;

    protected $listeners = [
        'editMachineGroup' => 'edit',
        'btnCreateMachineGroup' => 'resetInput'
    ];

    protected $rules = [
        'gruo_code' => 'required',
        'gruo_name' => 'required'
    ];

    protected $messages = [
        'gruo_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'gruo_name.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function edit($id)
    {
        $mcgruo = MachineGroup::findOrFail($id);
        $this->idKey = $mcgruo->id;
        $this->gruo_code = $mcgruo->gruo_code;
        $this->gruo_name = $mcgruo->gruo_name;
        $this->gruo_status = $mcgruo->gruo_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('gruo_code');
        $this->reset('gruo_name');
        $this->reset('gruo_status');
    }
    
    public function save()
    {
        $this->validate($this->rules,$this->messages);
        MachineGroup::updateOrCreate([
            'id' => $this->idKey
        ],[
            'gruo_code' => $this->gruo_code,
            'gruo_name' => $this->gruo_name,
            'gruo_status' => $this->gruo_status
        ]);
        $this->resetInput();
        $this->emit("refreshMachineGroup");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.machine-group.machine-group-form');
    }
}
