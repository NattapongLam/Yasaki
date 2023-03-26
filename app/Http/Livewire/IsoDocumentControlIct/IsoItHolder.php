<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoItHolder extends Component
{
    public $holder = [];
    
    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','IT')
        ->get();
        return view('livewire.iso-document-control-ict.iso-it-holder')->extends('layouts.main');
    }
}
