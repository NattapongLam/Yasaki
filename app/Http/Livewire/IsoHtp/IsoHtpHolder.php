<?php

namespace App\Http\Livewire\IsoHtp;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoHtpHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','HTP')
        ->get();
        return view('livewire.iso-htp.iso-htp-holder')->extends('layouts.main');
    }
}
