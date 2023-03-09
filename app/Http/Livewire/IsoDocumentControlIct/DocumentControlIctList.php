<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctComputerList;

class DocumentControlIctList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshDocumentControlIct' => '$refresh'
    ];
    
    public function render()
    {
        $ictcomlist = IsoIctComputerList::query();
        if($this->searchTerm){
            $ictcomlist = $ictcomlist
            ->where('com_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('com_ip','LIKE',"%{$this->searchTerm}%")
            ->orWhere('com_locat','LIKE',"%{$this->searchTerm}%");
        }
        $ictcomlist = $ictcomlist->paginate(20);
        return view('livewire.iso-document-control-ict.document-control-ict-list',[
            'ictcomlist' => $ictcomlist
        ])->extends('layouts.main');
    }
}
