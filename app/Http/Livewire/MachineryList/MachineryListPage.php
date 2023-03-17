<?php

namespace App\Http\Livewire\MachineryList;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MachineryList;
use Illuminate\Support\Facades\DB;

class MachineryListPage extends Component
{
    use WithPagination;
    
    public $mcdoculist =[];

    public function render()
    {
        if(auth()->user()->type == "Admin")
        {
            $this->mcdoculist = MachineryList::where('machinery_hd_status_id',1)->get();          
        }
        else if(auth()->user()->type == "Employee")
        {
            $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();          
            $this->mcdoculist = MachineryList::where('department_name',$emp->department_name)->where('machinery_hd_status_id',1)->get();  
        }
        return view('livewire.machinery-list.machinery-list-page')->extends('layouts.main');
    }
}
