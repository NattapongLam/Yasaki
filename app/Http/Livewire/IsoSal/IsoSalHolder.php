<?php

namespace App\Http\Livewire\IsoSal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoSalHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','SAL')
        ->get();
        return view('livewire.iso-sal.iso-sal-holder')->extends('layouts.main');
    }
}
