<?php

namespace App\Http\Livewire\IsoQcc;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoQccHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','QCC')
        ->get();
        return view('livewire.iso-qcc.iso-qcc-holder')->extends('layouts.main');
    }
}
