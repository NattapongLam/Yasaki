<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Excel;
use Livewire\Component;
use App\Imports\Checksheet;
use Livewire\WithFileUploads;

class DocumentControlIctChecksheetExcel extends Component
{
    use WithFileUploads;

    public $excel;

    public function importExcel()
    {
        Excel::import(new Checksheet,$this->excel->path());
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('documentcontrolictcheck.list')
        ]);
    }
    
    public function render()
    {
        return view('livewire.iso-document-control-ict.document-control-ict-checksheet-excel')->extends('layouts.main');
    }
}
