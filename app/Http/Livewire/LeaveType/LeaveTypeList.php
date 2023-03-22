<?php

namespace App\Http\Livewire\LeaveType;

use Livewire\Component;
use App\Models\LeaveType;
use Livewire\WithPagination;

class LeaveTypeList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshLeaveType' => '$refresh'
    ];

    public function render()
    {
        $leav = LeaveType::query();
        if($this->searchTerm){
            $leav = $leav
            ->where('ltype_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('ltype_desc','LIKE',"%{$this->searchTerm}%");
        }
        $leav = $leav->paginate(10);
        return view('livewire.leave-type.leave-type-list',[
            'leav' => $leav
        ])->extends('layouts.main');
    }
}
