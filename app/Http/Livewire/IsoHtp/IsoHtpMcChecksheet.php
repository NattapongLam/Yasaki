<?php

namespace App\Http\Livewire\IsoHtp;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoHtpMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('machine_checksheet_hds')
        ->where('ms_machine_group_code','HTP')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('checksheetmc_hd_date','asc')
        ->get();
        return view('livewire.iso-htp.iso-htp-mc-checksheet')->extends('layouts.main');
    }
}
