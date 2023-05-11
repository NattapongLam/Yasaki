<?php

namespace App\Http\Livewire\IsoMtn;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMtnMcChecksheet extends Component
{
    public $mcchk = [];
    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','MTN')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthcheck','desc')
        ->get();
        return view('livewire.iso-mtn.iso-mtn-mc-checksheet')->extends('layouts.main');
    }
}
