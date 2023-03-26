<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctMonthkpi;

class IsoItkpiList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshItkpi' => '$refresh'
    ];

    public function render()
    {
        $kpilist = IsoIctMonthkpi::query();
        if($this->searchTerm){
            $kpilist = $kpilist
            ->where('kpi_name','LIKE',"%{$this->searchTerm}%");
        }
        $kpilist = $kpilist->paginate(20);
        return view('livewire.iso-document-control-ict.iso-itkpi-list',[
            'kpilist' => $kpilist
        ])->extends('layouts.main');
    }
}
