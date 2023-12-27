<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class IsoFmIct05 extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $ictcomlist = DB::table('vw_iso_ict05');
        if($this->searchTerm){
            $ictcomlist = $ictcomlist
            ->where('com_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('cit_type','LIKE',"%{$this->searchTerm}%")
            ->orWhere('com_locat','LIKE',"%{$this->searchTerm}%");
        }
        $ictcomlist = $ictcomlist->paginate(15);
        return view('livewire.iso-document-control-ict.iso-fm-ict05',[
            'ictcomlist' => $ictcomlist
        ])->extends('layouts.main');
    }
}
