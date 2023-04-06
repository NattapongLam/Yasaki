<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctMonthkpi;

class DocumentControlKpiList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshIsokpi' => '$refresh'
    ];
    
    public function render()
    {
        $kpilist = IsoIctMonthkpi::query();
        if($this->searchTerm){
            $kpilist = $kpilist
            ->where('kpi_name','LIKE',"%{$this->searchTerm}%")
            ->orwhere('dep_name','LIKE',"%{$this->searchTerm}%");
        }
        $kpilist = $kpilist->paginate(20);
        return view('livewire.iso-document-control.document-control-kpi-list',[
            'kpilist' => $kpilist
        ])->extends('layouts.main');
    }
}
