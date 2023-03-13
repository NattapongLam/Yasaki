<?php

namespace App\Http\Livewire\LeaveApproval;

use Livewire\Component;

class LeaveApprovalListPage extends Component
{
    public function render()
    {
        return view('livewire.leave-approval.leave-approval-list-page')->extends('layouts.main');
    }
}
