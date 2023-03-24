<?php

namespace App\Http\Livewire\IsoQmr;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoQmrHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','QMR')
        ->get();
        return view('livewire.iso-qmr.iso-qmr-holder')->extends('layouts.main');
    }
}
