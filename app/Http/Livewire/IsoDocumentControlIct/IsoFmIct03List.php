<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctDocuService;

class IsoFmIct03List extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $ictcomlist = IsoIctDocuService::query();
        if($this->searchTerm){
            $ictcomlist = $ictcomlist
            ->where('com_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('serv_dep','LIKE',"%{$this->searchTerm}%")
            ->orWhere('serv_type','LIKE',"%{$this->searchTerm}%");
        }
        $ictcomlist = $ictcomlist->paginate(15);
        return view('livewire.iso-document-control-ict.iso-fm-ict03-list',[
            'ictcomlist' => $ictcomlist
        ])->extends('layouts.main');
    }
}
