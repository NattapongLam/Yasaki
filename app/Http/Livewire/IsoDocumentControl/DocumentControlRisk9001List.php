<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoPolicyLsit;

class DocumentControlRisk9001List extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    public function render()
    {
        $pollist = IsoPolicyLsit::where('pol_type','ประเมินความเสี่ยงด้านคุณภาพ ISO 9001');
        if($this->searchTerm){
            $pollist = $pollist
            ->where('pol_name','LIKE',"%{$this->searchTerm}%");
        }
        $pollist = $pollist->paginate(20);
        return view('livewire.iso-document-control.document-control-risk9001-list',[
            'pollist' => $pollist
        ])->extends('layouts.main');
    }
}
