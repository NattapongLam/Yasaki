<?php

namespace App\Http\Livewire\LeaveDocuno;

use Livewire\Component;
use App\Models\LeaveDocList;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class LeaveDocunoList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();
        if($emp->department_name == "สำนักงาน(OFF)"){
            $leavdoc = LeaveDocList::leftjoin('leave_doc_statuses','leave_doc_lists.lsta_id','=','leave_doc_statuses.lsta_id')
            ->leftjoin('leave_configs','leave_doc_lists.lconf_id','=','leave_configs.id')
            ->leftjoin('leave_types','leave_doc_lists.ltype_id','=','leave_types.id')
            ->select('leave_doc_lists.*','leave_configs.leav_name as leav_name',
            'leave_types.ltype_name as ltype_name','leave_doc_statuses.lsta_name as lsta_name')
            ->where('employee_code',auth()->user()->username);
        }else{
            $leavdoc = LeaveDocList::leftjoin('leave_doc_statuses','leave_doc_lists.lsta_id','=','leave_doc_statuses.lsta_id')
            ->leftjoin('leave_configs','leave_doc_lists.lconf_id','=','leave_configs.id')
            ->leftjoin('leave_types','leave_doc_lists.ltype_id','=','leave_types.id')
            ->select('leave_doc_lists.*','leave_configs.leav_name as leav_name',
            'leave_types.ltype_name as ltype_name','leave_doc_statuses.lsta_name as lsta_name')
            ->where('department_name',$emp->department_name);
        }
       
        if($this->searchTerm){
            $leavdoc = $leavdoc
            ->where('employee_code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('employee_fullname','LIKE',"%{$this->searchTerm}%");
        }
        $leavdoc = $leavdoc->paginate(15);
        return view('livewire.leave-docuno.leave-docuno-list',[
            'leavdoc' => $leavdoc
        ])->extends('layouts.main');
    }
}
