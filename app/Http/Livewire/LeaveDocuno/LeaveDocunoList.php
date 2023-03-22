<?php

namespace App\Http\Livewire\LeaveDocuno;

use Livewire\Component;
use App\Models\LeaveDocList;
use Livewire\WithPagination;

class LeaveDocunoList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $leavdoc = LeaveDocList::join('leave_doc_statuses','leave_doc_lists.lsta_id','=','leave_doc_statuses.lsta_id');
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
