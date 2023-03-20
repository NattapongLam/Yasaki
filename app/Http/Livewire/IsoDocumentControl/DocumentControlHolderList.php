<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoHolderList;


class DocumentControlHolderList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;
    
    public function render()
    {
        $isohold = IsoHolderList::query();
        if($this->searchTerm){
            $isohold = $isohold
            ->where('iso_docutype_code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('emp_department_refcode','LIKE',"%{$this->searchTerm}%")
            ->orwhere('iso_doculist_name','LIKE',"%{$this->searchTerm}%");
        }
        $isohold = $isohold->paginate(20);
        return view('livewire.iso-document-control.document-control-holder-list',[
            'isohold' => $isohold
        ])->extends('layouts.main');
    }
}
