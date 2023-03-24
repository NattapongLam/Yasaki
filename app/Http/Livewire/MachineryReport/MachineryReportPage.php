<?php

namespace App\Http\Livewire\MachineryReport;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MachineryList;
use Illuminate\Support\Facades\DB;

class MachineryReportPage extends Component
{
    public function render()
    {
        if(auth()->user()->type == "Admin" || auth()->user()->type == "Maintenance")
        {
            $mcdoculist = MachineryList::join('machinery_list_statuses','machinery_lists.machinery_hd_status_id','=','machinery_list_statuses.id')
            ->select('machinery_lists.*','machinery_list_statuses.id as sta_id','machinery_list_statuses.name as sta_name')
            ->where('machinery_lists.machinery_hd_status_id',3)->get();                    
        }
        elseif(auth()->user()->username == "A570126")
        {
            $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();          
            $mcdoculist = MachineryList::join('machinery_list_statuses','machinery_lists.machinery_hd_status_id','=','machinery_list_statuses.id')
            ->select('machinery_lists.*','machinery_list_statuses.id as sta_id','machinery_list_statuses.name as sta_name')
            ->where('machinery_lists.machinery_hd_status_id',3)
            ->where('department_name',['ทำสี(PTG)','แพ็คกิ้ง(PKG)'])->get(); 
        }
        elseif(auth()->user()->type == "Employee")
        {

            $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();          
            $mcdoculist = MachineryList::join('machinery_list_statuses','machinery_lists.machinery_hd_status_id','=','machinery_list_statuses.id')
            ->select('machinery_lists.*','machinery_list_statuses.id as sta_id','machinery_list_statuses.name as sta_name')
            ->where('machinery_lists.machinery_hd_status_id',3)
            ->where('department_name',$emp->department_name)->get(); 
        }
        return view('livewire.machinery-report.machinery-report-page',[
            'mcdoculist' => $mcdoculist 
        ])->extends('layouts.main');      
    }
}
