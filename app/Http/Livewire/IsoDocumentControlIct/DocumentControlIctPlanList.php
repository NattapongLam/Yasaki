<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use App\Models\IsoIctPlanHd;
use Livewire\WithPagination;

class DocumentControlIctPlanList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $plans = IsoIctPlanHd::query();
        if($this->searchTerm){
            $plans = $plans
            ->where('year_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('planhd_type','LIKE',"%{$this->searchTerm}%");
        }
        $plans = $plans->paginate(15);
        return view('livewire.iso-document-control-ict.document-control-ict-plan-list',[
            'plans' => $plans
        ])->extends('layouts.main');
    }
}
