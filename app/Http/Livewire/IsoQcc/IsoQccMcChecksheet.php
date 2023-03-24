<?php

namespace App\Http\Livewire\IsoQcc;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoQccMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('machine_checksheet_hds')
        ->where('ms_machine_group_code','QCC')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('checksheetmc_hd_date','asc')
        ->get();
        return view('livewire.iso-qcc.iso-qcc-mc-checksheet')->extends('layouts.main');
    }
}
