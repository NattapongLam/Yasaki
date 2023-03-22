<?php

namespace App\Http\Livewire\LeaveType;

use Livewire\Component;
use App\Models\LeaveType;

class LeaveTypeForm extends Component
{
    public $idKey = 0;
    public $ltype_name;
    public $ltype_qty=1;
    public $ltype_desc;
    public $ltype_status = 1;

    protected $listeners = [
        'editLeaveType' => 'edit',
        'btnCreateLeaveType' => 'resetInput'
    ];

    protected $rules = [
        'ltype_name' => 'required',
        'ltype_qty' => 'required',
    ];

    protected $messages = [
        'ltype_name.required' => 'กรุณากรอกใส่ข้อมูล',
        'ltype_qty.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('ltype_name');
        $this->reset('ltype_qty');
        $this->reset('ltype_desc');
        $this->reset('ltype_status');
    }
    public function edit($id)
    {
        $leav = LeaveType::findOrFail($id);
        $this->idKey = $leav->id;
        $this->ltype_name = $leav->ltype_name;
        $this->ltype_qty = $leav->ltype_qty;
        $this->ltype_desc = $leav->ltype_desc;
        $this->ltype_status = $leav->ltype_status;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        LeaveType::updateOrCreate([
            'id' => $this->idKey
        ],[
            'ltype_name' => $this->ltype_name,
            'ltype_qty' => $this->ltype_qty,
            'ltype_desc' => $this->ltype_desc,
            'ltype_status' => $this->ltype_status
        ]);
        $this->resetInput();
        $this->emit("refreshLeaveType");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.leave-type.leave-type-form');
    }
}
