<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoDocumentType;

class DocumentControlTypeList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshDocumentControlType' => '$refresh'
    ];
    
    public function render()
    {
        $doctype = IsoDocumentType::query();
        if($this->searchTerm){
            $doctype = $doctype
            ->where('doc_typcode','LIKE',"%{$this->searchTerm}%")
            ->orWhere('doc_typname','LIKE',"%{$this->searchTerm}%");
        }
        $doctype = $doctype->paginate(10);
        return view('livewire.iso-document-control.document-control-type-list',[
            'doctype' => $doctype
        ])->extends('layouts.main');
    }
}
