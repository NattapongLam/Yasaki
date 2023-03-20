<?php

namespace App\Http\Livewire\IsoDct;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoDctHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','DCT')
        ->get();
        return view('livewire.iso-dct.iso-dct-holder')->extends('layouts.main');
    }
}
