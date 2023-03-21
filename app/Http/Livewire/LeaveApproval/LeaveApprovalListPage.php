<?php

namespace App\Http\Livewire\LeaveApproval;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LeaveApprovalHd;

class LeaveApprovalListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    public function render()
    {
        $leavhd = LeaveApprovalHd::query();
        if($this->searchTerm){
            $leavhd = $leavhd
            ->where('leavapp_code','LIKE',"%{$this->searchTerm}%");
        };
        $leavhd = $leavhd->paginate(15);
        return view('livewire.leave-approval.leave-approval-list-page',[
            'leavhd' => $leavhd
        ])->extends('layouts.main');
    }
}
