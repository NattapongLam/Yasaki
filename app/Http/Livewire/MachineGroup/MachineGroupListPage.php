<?php

namespace App\Http\Livewire\MachineGroup;

use Livewire\Component;
use App\Models\MachineGroup;
use Livewire\WithPagination;

class MachineGroupListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshMachineGroup' => '$refresh'
    ];

    public function render()
    {
        $mcgruo = MachineGroup::query();
        if($this->searchTerm){
            $mcgruo = $mcgruo
            ->where('gruo_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('gruo_name','LIKE',"%{$this->searchTerm}%");
        }
        $mcgruo = $mcgruo->paginate(10);
        return view('livewire.machine-group.machine-group-list-page',[
            'mcgruos' => $mcgruo
        ])->extends('layouts.main');
    }
}
