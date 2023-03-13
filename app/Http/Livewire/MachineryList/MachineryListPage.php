<?php

namespace App\Http\Livewire\MachineryList;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MachineryList;

class MachineryListPage extends Component
{
    use WithPagination;
    
    public $mcdoculist =[];

    public function render()
    {
        if(auth()->user()->type == "Admin")
        {
            $this->mcdoculist = MachineryList::where('machinery_hd_status_id',1)->get();          
        }
        return view('livewire.machinery-list.machinery-list-page')->extends('layouts.main');
    }
}
