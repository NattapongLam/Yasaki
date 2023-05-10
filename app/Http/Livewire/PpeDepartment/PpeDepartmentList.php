<?php

namespace App\Http\Livewire\PpeDepartment;

use Livewire\Component;
use App\Models\EmployeeList;
use Livewire\WithPagination;
use App\Models\IsoPpeDepartmentHD;
use Illuminate\Support\Facades\Auth;

class PpeDepartmentList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        if(Auth::user()->type == "Admin"){
            $ppe = IsoPpeDepartmentHD::query();
        }else{
            $emp = EmployeeList::where('employee_code',Auth::user()->username)->first();
            if($emp->employee_code == "A570126"){
                $ppe = IsoPpeDepartmentHD::whereIn('department_name',['แพ็คกิ้ง(PKG)','ทำสี(PTG)'])->where('flag',true);
            }else{
                $ppe = IsoPpeDepartmentHD::where('department_name',$emp->department_name)->where('flag',true);
            }        
        }
        if($this->searchTerm){
            $ppe = $ppe
            ->where('department_name','LIKE',"%{$this->searchTerm}%")
            ->orwhere('job_desc','LIKE',"%{$this->searchTerm}%");
        }
        $ppe = $ppe->paginate(10);
        return view('livewire.ppe-department.ppe-department-list',[
            'ppe' => $ppe
        ])->extends('layouts.main');
    }
}
