<?php

namespace App\Http\Livewire\IsoStr;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoStrHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','STR')
        ->get();
        return view('livewire.iso-str.iso-str-holder')->extends('layouts.main');
    }
}
