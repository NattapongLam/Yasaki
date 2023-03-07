<?php

namespace App\Http\Livewire\DepartmentList;

use Livewire\Component;
use App\Models\DepartmentList;

class DepartmentListForm extends Component
{
    public $idKey = 0;
    public $department_code;
    public $department_name;
    public $department_refcode;
    public $department_status = 1;
    public $department_save;

    protected $listeners = [
        'editDepartment' => 'edit',
        'btnCreateDepartment' => 'resetInput'
    ];

    protected $rules = [
        'department_code' => 'required',
        'department_name' => 'required',
        'department_refcode' => 'required'
    ];

    protected $messages = [
        'department_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'department_name.required' => 'กรุณากรอกใส่ข้อมูล',
        'department_refcode.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function edit($id)
    {
        $dep = DepartmentList::findOrFail($id);
        $this->idKey = $dep->id;
        $this->department_code = $dep->department_code;
        $this->department_name = $dep->department_name;
        $this->department_refcode = $dep->department_refcode;
        $this->department_status = $dep->department_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('department_code');
        $this->reset('department_name');
        $this->reset('department_refcode');
        $this->reset('department_status');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        DepartmentList::updateOrCreate([
            'id' => $this->idKey
        ],[
            'department_code' => $this->department_code,
            'department_name' => $this->department_name,
            'department_refcode' => $this->department_refcode,
            'department_status' => $this->department_status,
            'department_save' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->emit("refreshDepartment");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.department-list.department-list-form');
    }
}
