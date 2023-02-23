<?php

namespace App\Http\Livewire\MachineSystem;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MachineSystem;

class MachineSystemListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshMachineSystem' => '$refresh'
    ];

    public function render()
    {
        $mcsyst = MachineSystem::query();
        if($this->searchTerm){
            $mcsyst = $mcsyst
            ->where('syst_name','LIKE',"%{$this->searchTerm}%");
        }
        $mcsyst = $mcsyst->paginate(10);
        return view('livewire.machine-system.machine-system-list-page',[
            'mcsysts' => $mcsyst 
        ])->extends('layouts.main');
    }
}
