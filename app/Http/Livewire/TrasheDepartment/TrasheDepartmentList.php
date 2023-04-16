<?php

namespace App\Http\Livewire\TrasheDepartment;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\IsoTrasheDepartment;

class TrasheDepartmentList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $tras = DB::table('vw_trashe_departments');
        if($this->searchTerm){
            $tras = $tras
            ->where('department_name','LIKE',"%{$this->searchTerm}%");
        }
        $tras = $tras->paginate(10);
        return view('livewire.trashe-department.trashe-department-list',[
            'tras' => $tras
        ])->extends('layouts.main');
    }
}
