<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctComputerList;

class DocumentControlIctComputerList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    public function render()
    {
        $coms = IsoIctComputerList::wherein('com_type',['คอมพิวเตอร์','SERVER']);
        if($this->searchTerm){
            $coms = $coms
            ->where('com_name','LIKE',"%{$this->searchTerm}%")
            ->orWhere('com_locat','LIKE',"%{$this->searchTerm}%");
        }
        $coms = $coms->paginate(10);
        return view('livewire.iso-document-control-ict.document-control-ict-computer-list',[
            'coms' =>  $coms
        ]);
    }
}
