<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoDocumentGroup;

class DocumentControlGroupList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshDocumentControlGroup' => '$refresh'
    ];
    
    public function render()
    {
        $docgroup = IsoDocumentGroup::query();
        if($this->searchTerm){
            $docgroup = $docgroup
            ->where('doc_grocode','LIKE',"%{$this->searchTerm}%")
            ->orWhere('doc_groname','LIKE',"%{$this->searchTerm}%");
        }
        $docgroup = $docgroup->paginate(10);
        return view('livewire.iso-document-control.document-control-group-list',[
            'docgroup' => $docgroup
        ])->extends('layouts.main');
    }
}
