<?php

namespace App\Http\Livewire\MachineryReport;

use Livewire\Component;
use App\Models\MachineryList;
use Illuminate\Support\Facades\DB;

class MachineryReportPage extends Component
{

    public $mcdoculist =[];

    public function render()
    {
        if(auth()->user()->type == "Admin")
        {
            $this->mcdoculist = MachineryList::join('machinery_list_statuses','machinery_lists.machinery_hd_status_id','=','machinery_list_statuses.id')
            ->select('machinery_lists.*','machinery_list_statuses.id as sta_id','machinery_list_statuses.name as sta_name')->get();                    
        }
         if(auth()->user()->type == "Employee")
        {
            $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();          
            $this->mcdoculist = MachineryList::get();  
        }  
        return view('livewire.machinery-report.machinery-report-page')->extends('layouts.main');      
    }
}
