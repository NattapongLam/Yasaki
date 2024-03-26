<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IsoIctServerBackup;

class DocumentControlIctBackupList extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    protected $listeners = [
        'refreshDocumentControlIctBackup' => '$refresh'
    ];

    public function render()
    {
        $ictbackup = IsoIctServerBackup::where('year_name','2024');
        if($this->searchTerm){
            $ictbackup = $ictbackup
            ->where('year_name','LIKE',"%{$this->searchTerm}%");
        }
        $ictbackup = $ictbackup->paginate(12);
        return view('livewire.iso-document-control-ict.document-control-ict-backup-list',[
            'ictbackup' => $ictbackup
        ])->extends('layouts.main');
    }
}
