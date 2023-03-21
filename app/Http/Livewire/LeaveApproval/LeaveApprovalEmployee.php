<?php

namespace App\Http\Livewire\LeaveApproval;

use Livewire\Component;
use App\Models\EmployeeList;
use Livewire\WithPagination;

class LeaveApprovalEmployee extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;
    
    public function render()
    {
        $emps = EmployeeList::where('employee_code','LIKE','A%');
        if($this->searchTerm){
            $emps = $emps
            ->where('employee_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('employee_fullname','LIKE',"%{$this->searchTerm}%");
        }
        $emps = $emps->paginate(10);
        return view('livewire.leave-approval.leave-approval-employee',[
            'emps' => $emps
        ]);
    }
}
