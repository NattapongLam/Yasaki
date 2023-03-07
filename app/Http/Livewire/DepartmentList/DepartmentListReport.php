<?php

namespace App\Http\Livewire\DepartmentList;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DepartmentList;

class DepartmentListReport extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshDepartment' => '$refresh'
    ];

    public function render()
    {
        $deplist= DepartmentList::query();
        if($this->searchTerm){
            $deplist = $deplist
            ->where('department_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('department_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('department_refcode','LIKE',"%{$this->searchTerm}%");
        }
        $deplist = $deplist->paginate(15);
        return view('livewire.department-list.department-list-report',[
            'deplist' => $deplist
        ])->extends('layouts.main');
    }
}
