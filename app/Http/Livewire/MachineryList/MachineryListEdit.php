<?php

namespace App\Http\Livewire\MachineryList;

use Livewire\Component;
use App\Models\EmployeeList;
use App\Models\MachineryList;
use App\Models\MachineSystem;
use App\Models\DepartmentList;
use App\Models\MachineService;
use App\Models\MachineryListSub;

class MachineryListEdit extends Component
{
    public $idKey = 0;
    public $machinery_hd_date;
    public $machinery_hd_docuno;
    public $machinery_hd_type="ด่วน";
    public $ms_machine_code;
    public $ms_machine_name;
    public $department_name;
    public $machinery_hd_lcaol;
    public $ms_machine_system_name;
    public $ms_machine_service_name;
    public $machinery_hd_save;
    public $machinery_hd_note;
    public $machinery_hd_number;
    public $machinery_hd_checksave;
    public $machinery_hd_checkdate;
    public $machinery_hd_checknote;
    public $machinery_hd_status_id=3;
    public $machinery_hd_personsave;
    public $vendor_code;
    public $vendor_name;
    public $machinery_hd_refdocuno;
    public $machinery_hd_pic1;
    public $machinery_hd_pic2;

    public $sublists = [];
    public $machinery_dt_remark = [];
    public $machinery_dt_hour =[];
    public $machinery_dt_date =[];

    public function deleteSublistRow($index)
    {
        unset($this->sublists[$index]);
    }

    public function addSublist()
    {
        $this->sublists[] = [
            'machinery_dt_remark' => "",
            'machinery_dt_hour' => 0.00,
            'machinery_dt_date' => date('Y-m-d')
        ];
        $this->machinery_dt_remark[] = '';
        $this->machinery_dt_hour[] = 0.00;
        $this->machinery_dt_date[] = date('Y-m-d');
    }

    protected $rules = [
        'machinery_hd_date' => "required",
        'machinery_hd_docuno' => "required",
        'machinery_hd_type' => "required",
        'ms_machine_name' => "required",
        'department_name' => "required",
        'machinery_hd_lcaol' => "required",
        'ms_machine_system_name' => "required",
        'ms_machine_service_name' => "required",
        'machinery_hd_status_id' => "required",
        'machinery_hd_note' => "required",
    ];

    protected $messages = [
        'machinery_hd_date.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_docuno.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_type.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_name.required' => "กรุณาใส่ข้อมูล",
        'department_name.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_lcaol.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_system_name.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_service_name.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_status_id.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_note.required' => "กรุณาใส่ข้อมูล",
    ];
    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('machinery_hd_date');
        $this->reset('machinery_hd_docuno');
        $this->reset('machinery_hd_status_id');
        $this->reset('machinery_hd_number');
        $this->reset('machinery_hd_type');
        $this->reset('ms_machine_code');
        $this->reset('ms_machine_name');
        $this->reset('department_name');
        $this->reset('machinery_hd_lcaol');
        $this->reset('ms_machine_system_name');
        $this->reset('ms_machine_service_name');
        $this->reset('machinery_hd_note');
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $mcdocu = MachineryList::findOrFail($id);
            $this->idKey = $mcdocu->id;
            $this->machinery_hd_date = $mcdocu->machinery_hd_date;
            $this->machinery_hd_docuno = $mcdocu->machinery_hd_docuno;
            $this->machinery_hd_status_id= $mcdocu->machinery_hd_status_id;
            $this->machinery_hd_number= $mcdocu->machinery_hd_number;
            $this->machinery_hd_type= $mcdocu->machinery_hd_type;
            $this->ms_machine_code = $mcdocu->ms_machine_code;
            $this->ms_machine_name = $mcdocu->ms_machine_name;
            $this->department_name = $mcdocu->department_name;
            $this->machinery_hd_lcaol= $mcdocu->machinery_hd_lcaol;
            $this->ms_machine_system_name = $mcdocu->ms_machine_system_name;
            $this->ms_machine_service_name= $mcdocu->ms_machine_service_name;
            $this->machinery_hd_note= $mcdocu->machinery_hd_note;
        }
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
    }

    public function render()
    {
        $list = MachineryListSub::where('machinery_hd_docuno',$this->machinery_hd_docuno)->get();
        $this->machinery_hd_checkdate = date('Y-m-d');
        return view('livewire.machinery-list.machinery-list-edit',[
            'dep' => DepartmentList::get(),
            'sys' => MachineSystem::get(),
            'ser' => MachineService::get(),
            'emp' => EmployeeList::where('department_name','ซ่อมบำรุง(MTN)')->get(),
            'doc' => $this->idKey,
            'list' => $list  
            ])->extends('layouts.main');
    }
}
