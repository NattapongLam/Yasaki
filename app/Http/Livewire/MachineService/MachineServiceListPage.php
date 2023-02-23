<?php

namespace App\Http\Livewire\MachineService;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MachineService;

class MachineServiceListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshMachineService' => '$refresh'
    ];

    public function render()
    {
        $mcserv = MachineService::query();
        if($this->searchTerm){
            $mcserv = $mcserv
            ->where('serv_name','LIKE',"%{$this->searchTerm}%");
        }
        $mcserv = $mcserv->paginate(10);
        return view('livewire.machine-service.machine-service-list-page',[
           'mcservs' => $mcserv 
        ])->extends('layouts.main');
    }
}
