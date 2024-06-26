<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EmployeeListPage extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $searchTerm;
    
    public function render()
    {      
        $employees = User::query();
        if($this->searchTerm){
            $employees = $employees
            ->where('name','LIKE',"%{$this->searchTerm}%")
            ->orwhere('username','LIKE',"%{$this->searchTerm}%");
        }
        $employees = $employees->paginate(15);
        return view('livewire.employee.employee-list-page',[
            'employees' => $employees
        ])->extends('layouts.main');
    }
}
