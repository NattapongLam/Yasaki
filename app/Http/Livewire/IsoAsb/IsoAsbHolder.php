<?php

namespace App\Http\Livewire\IsoAsb;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoAsbHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','ASB')
        ->get();
        return view('livewire.iso-asb.iso-asb-holder')->extends('layouts.main');
    }
}
