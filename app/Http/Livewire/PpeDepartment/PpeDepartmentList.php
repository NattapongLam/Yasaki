<?php

namespace App\Http\Livewire\PpeDepartment;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoPpeDepartmentHD;

class PpeDepartmentList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $ppe = IsoPpeDepartmentHD::query();
        if($this->searchTerm){
            $ppe = $ppe
            ->where('department_name','LIKE',"%{$this->searchTerm}%")
            ->orwhere('job_desc','LIKE',"%{$this->searchTerm}%");
        }
        $ppe = $ppe->paginate(10);
        return view('livewire.ppe-department.ppe-department-list',[
            'ppe' => $ppe
        ])->extends('layouts.main');
    }
}
