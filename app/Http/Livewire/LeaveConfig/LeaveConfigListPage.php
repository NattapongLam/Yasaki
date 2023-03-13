<?php

namespace App\Http\Livewire\LeaveConfig;

use Livewire\Component;
use App\Models\LeaveConfig;
use Livewire\WithPagination;

class LeaveConfigListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshLeaveConfig' => '$refresh'
    ];

    public function render()
    {
        $leav = LeaveConfig::query();
        if($this->searchTerm){
            $leav = $leav
            ->where('leav_code','LIKE',"%{$this->searchTerm}%")
            ->orWhere('leav_name','LIKE',"%{$this->searchTerm}%");
        }
        $leav = $leav->paginate(10);
        return view('livewire.leave-config.leave-config-list-page',[
            'leav' => $leav
        ])->extends('layouts.main');
    }
}
