<?php

namespace App\Http\Livewire\IsoPtg;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPtgHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PTG')
        ->get();
        return view('livewire.iso-ptg.iso-ptg-holder')->extends('layouts.main');
    }
}
