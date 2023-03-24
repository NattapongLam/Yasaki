<?php

namespace App\Http\Livewire\IsoPur;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPurHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PUR')
        ->get();
        return view('livewire.iso-pur.iso-pur-holder')->extends('layouts.main');
    }
}
