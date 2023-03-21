<?php

namespace App\Http\Livewire\EmployeeList;

use Livewire\Component;
use App\Models\EmployeeList;
use App\Models\DepartmentList;

class EmployeeListForm extends Component
{
    public $idKey = 0;
    public $employee_code;
    public $employee_fullname;
    public $employee_company;
    public $employee_job;
    public $employee_taxid;
    public $employee_sex;
    public $employee_country;
    public $employee_image;
    public $department_id;
    public $department_code;
    public $approval_id;
    public $employee_status=1;
    public $employee_save;   
    public $employee_id;
    public $employee_date;
    public $employee_tel;
    public $department_name;
    public $sickleave=0;
    public $businessleave=0;
    public $vacation=0;

    protected $listeners = [
        'editEmployeeList' => 'edit',
        'btnCreateEmployeeList' => 'resetInput'
    ];

    protected $rules = [
        'employee_code' => 'required',
        'employee_fullname' => 'required',
        'approval_id' => 'required',
        'department_id' => 'required',
        'employee_company' => 'required'
    ];

    protected $messages = [
        'employee_code.required' => 'กรุณากรอกใส่ข้อมูล',
        'employee_fullname.required' => 'กรุณากรอกใส่ข้อมูล',
        'approval_id.required' => 'กรุณากรอกใส่ข้อมูล',
        'department_id.required' => 'กรุณากรอกใส่ข้อมูล',
        'employee_company.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    public function edit($id)
    {
        $emp = EmployeeList::findOrFail($id);
        $this->idKey = $emp->id;
        $this->employee_code = $emp->employee_code;
        $this->employee_fullname = $emp->employee_fullname;
        $this->employee_company = $emp->employee_company;
        $this->employee_job = $emp->employee_job;
        $this->employee_taxid = $emp->employee_taxid;
        $this->employee_sex = $emp->employee_sex;
        $this->employee_country = $emp->employee_country;
        $this->employee_image = $emp->employee_image;
        $this->department_id = $emp->department_id;
        $this->department_code = $emp->department_code;
        $this->approval_id = $emp->approval_id;
        $this->employee_status = $emp->employee_status;
        $this->employee_save = $emp->employee_save;  
        $this->employee_id = $emp->employee_id;
        $this->employee_date = $emp->employee_date;
        $this->employee_tel = $emp->employee_tel;
        $this->department_name = $emp->department_name;
        $this->sickleave = $emp->sickleave;
        $this->businessleave = $emp->businessleave;
        $this->vacation = $emp->vacation;
    }
    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('employee_code');
        $this->reset('employee_fullname');
        $this->reset('employee_company');
        $this->reset('department_id');
        $this->reset('employee_job');
        $this->reset('sickleave');
        $this->reset('businessleave');
        $this->reset('vacation');
    }
    public function save()
    {
        EmployeeList::where('id',$this->idKey)->update([
            'sickleave' => $this->sickleave,
            'businessleave' => $this->businessleave,
            'vacation' => $this->vacation,
            'employee_save' => auth()->user()->name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('employeelist.list')
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        $dep = DepartmentList::get();
        return view('livewire.employee-list.employee-list-form',[
            'dep' => $dep 
        ]);
    }
}
