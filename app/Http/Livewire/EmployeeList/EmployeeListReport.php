<?php

namespace App\Http\Livewire\EmployeeList;

use Livewire\Component;
use App\Models\EmployeeList;
use Livewire\WithPagination;

class EmployeeListReport extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $emplist= EmployeeList::query()
        ->where('employee_status',true)
        ->orderby('department_code','asc');
        if($this->searchTerm){
            $emplist = $emplist
            ->where('employee_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('employee_fullname','LIKE',"%{$this->searchTerm}%");
        }
        $emplist = $emplist->paginate(15);
        return view('livewire.employee-list.employee-list-report',[
            'emplist' => $emplist
        ])->extends('layouts.main');
    }
}
