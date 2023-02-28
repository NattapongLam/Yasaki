<?php

namespace App\Http\Livewire\Machine;

use App\Models\Machine;
use Livewire\Component;
use Livewire\WithPagination;

class MachineListPage extends Component
{
    use WithPagination;

    public $searchTerm;
    
    public function render()
    {
        $machines = Machine::query();
        if($this->searchTerm){
            $machines = $machines
            ->where('mc_code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('mc_name','LIKE',"%{$this->searchTerm}%");
        }
        $machines = $machines->paginate(15);
        return view('livewire.machine.machine-list-page',[
            'machines' =>  $machines
        ])->extends('layouts.main');
    }
}
