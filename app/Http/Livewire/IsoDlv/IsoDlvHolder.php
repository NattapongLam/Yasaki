<?php

namespace App\Http\Livewire\IsoDlv;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoDlvHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','DLV')
        ->get();
        return view('livewire.iso-dlv.iso-dlv-holder')->extends('layouts.main');
    }
}
