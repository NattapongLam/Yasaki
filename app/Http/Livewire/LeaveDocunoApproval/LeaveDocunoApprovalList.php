<?php

namespace App\Http\Livewire\LeaveDocunoApproval;

use Livewire\Component;
use App\Models\LeaveDocList;

class LeaveDocunoApprovalList extends Component
{

    public function render()
    {
        $doc = LeaveDocList::join('leave_approval_dts','leave_doc_lists.approval_id','=','leave_approval_dts.leavapp_id')
        ->join('leave_configs','leave_doc_lists.lconf_id','=','leave_configs.id')
        ->join('leave_types','leave_doc_lists.ltype_id','=','leave_types.id')
        ->join('employee_lists','leave_doc_lists.employee_code','=','employee_lists.employee_code')
        ->select('leave_doc_lists.*','leave_configs.leav_name as leav_name',
        'leave_types.ltype_name as ltype_name','employee_lists.employee_image as employee_image','employee_lists.department_name as department_name')
        ->where('lsta_id',1)
        ->where('leave_approval_dts.leavsub_empcode',auth()->user()->username)
        ->get();
        return view('livewire.leave-docuno-approval.leave-docuno-approval-list',[
            'doc' => $doc
        ])->extends('layouts.main');
    }
}
