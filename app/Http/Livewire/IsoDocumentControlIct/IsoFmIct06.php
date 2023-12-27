<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctComputerList;

class IsoFmIct06 extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $ictcomlist = IsoIctComputerList::where('com_type','คอมพิวเตอร์');
        if($this->searchTerm){
            $ictcomlist = $ictcomlist
            ->where('com_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('com_ip','LIKE',"%{$this->searchTerm}%")
            ->orWhere('com_locat','LIKE',"%{$this->searchTerm}%");
        }
        $ictcomlist = $ictcomlist->paginate(15);
        return view('livewire.iso-document-control-ict.iso-fm-ict06',[
            'ictcomlist' => $ictcomlist
        ])->extends('layouts.main');
    }
}
