<?php

namespace App\Http\Livewire\IsoPtd;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPtdHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PDT')
        ->get();
        return view('livewire.iso-ptd.iso-ptd-holder')->extends('layouts.main');
    }
}
