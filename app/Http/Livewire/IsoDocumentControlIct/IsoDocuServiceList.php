<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;

class IsoDocuServiceList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshItService' => '$refresh'
    ];
    
    public function render()
    {
        return view('livewire.iso-document-control-ict.iso-docu-service-list');
    }
}
