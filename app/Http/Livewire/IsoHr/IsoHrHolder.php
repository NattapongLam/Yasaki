<?php

namespace App\Http\Livewire\IsoHr;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoHrHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','HR')
        ->get();
        return view('livewire.iso-hr.iso-hr-holder')->extends('layouts.main');
    }
}
