<?php

namespace App\Http\Livewire\TrasheDepartment;

use Livewire\Component;
use App\Models\EmployeeList;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\IsoTrasheDepartment;
use Illuminate\Support\Facades\Auth;

class TrasheDepartmentList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        if(Auth::user()->type == "Admin"){
            $tras = DB::table('vw_trashe_departments');
        }
        else {
            $emp = EmployeeList::where('employee_code',Auth::user()->username)->first();
            if($emp->employee_code == "A570126"){
                $tras = DB::table('vw_trashe_departments')->whereIn('department_name',['แพ็คกิ้ง(PKG)','ทำสี(PTG)']);
            }else {
                $tras = DB::table('vw_trashe_departments')->where('department_name',$emp->department_name);
            }
        }
        if($this->searchTerm){
            $tras = $tras
            ->where('department_name','LIKE',"%{$this->searchTerm}%");
        }
        $tras = $tras->paginate(10);
        return view('livewire.trashe-department.trashe-department-list',[
            'tras' => $tras
        ])->extends('layouts.main');
    }
}
