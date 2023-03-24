<?php

namespace App\Http\Livewire\IsoDlv;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoDlvMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('machine_checksheet_hds')
        ->where('ms_machine_group_code','DLV')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('checksheetmc_hd_date','asc')
        ->get();
        return view('livewire.iso-dlv.iso-dlv-mc-checksheet')->extends('layouts.main');
    }
}
