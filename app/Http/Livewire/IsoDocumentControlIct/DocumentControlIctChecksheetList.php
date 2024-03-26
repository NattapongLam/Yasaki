<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctChecksheet;

class DocumentControlIctChecksheetList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshIctChecksheet' => '$refresh'
    ];
    
    public function render()
    {
        $itchecklist = IsoIctChecksheet::query();
        if($this->searchTerm){
            $itchecklist = $itchecklist
            ->where('com_name','LIKE',"%{$this->searchTerm}%");
        }
        $itchecklist = $itchecklist->orderBy('cit_date','DESC');
        $itchecklist = $itchecklist->paginate(20);
        return view('livewire.iso-document-control-ict.document-control-ict-checksheet-list',[
            'itchecklist' => $itchecklist
        ])->extends('layouts.main');
    }
}
