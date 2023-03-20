<?php

namespace App\Http\Livewire\IsoMch;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMchHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','MCH')
        ->get();
        return view('livewire.iso-mch.iso-mch-holder')->extends('layouts.main');
    }
}
