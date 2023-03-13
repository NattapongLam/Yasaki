<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoMasterList;

class DocumentControlMasterList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;
    
    public function render()
    {
        $isodocs = IsoMasterList::where('iso_docustatus_name','<>','ยกเลิก');
        if($this->searchTerm){
            $isodocs = $isodocs
            ->where('iso_docugroup_name','LIKE',"%{$this->searchTerm}%")
            ->orwhere('iso_docutype_code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('iso_doculist_code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('iso_doculist_name','LIKE',"%{$this->searchTerm}%");
        }
        $isodocs = $isodocs->paginate(20);
        return view('livewire.iso-document-control.document-control-master-list',[
            'isodocs' => $isodocs
        ])->extends('layouts.main');
    }
}
