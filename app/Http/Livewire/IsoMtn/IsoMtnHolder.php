<?php

namespace App\Http\Livewire\IsoMtn;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMtnHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','MTN')
        ->get();
        return view('livewire.iso-mtn.iso-mtn-holder')->extends('layouts.main');
    }
}
