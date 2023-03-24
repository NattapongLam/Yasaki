<?php

namespace App\Http\Livewire\IsoClb;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoClbHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','CLB')
        ->get();
        return view('livewire.iso-clb.iso-clb-holder')->extends('layouts.main');
    }
}
