<?php

namespace App\Http\Livewire\LeaveApproval;

use Livewire\Component;

class LeaveApprovalListForm extends Component
{
    public function render()
    {
        return view('livewire.leave-approval.leave-approval-list-form')->extends('layouts.main');
    }
}
