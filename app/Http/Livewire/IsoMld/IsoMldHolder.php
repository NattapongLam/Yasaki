<?php

namespace App\Http\Livewire\IsoMld;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMldHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','MLD')
        ->get();
        return view('livewire.iso-mld.iso-mld-holder')->extends('layouts.main');
    }
}
