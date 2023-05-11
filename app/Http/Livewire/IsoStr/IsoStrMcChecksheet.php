<?php

namespace App\Http\Livewire\IsoStr;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoStrMcChecksheet extends Component
{
    public $mcchk = [];
    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','STR')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthcheck','desc')
        ->get();
        return view('livewire.iso-str.iso-str-mc-checksheet')->extends('layouts.main');
    }
}
