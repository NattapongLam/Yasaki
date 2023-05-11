<?php

namespace App\Http\Livewire\IsoDct;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoDctMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','DCT')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthcheck','desc')
        ->get();
        return view('livewire.iso-dct.iso-dct-mc-checksheet')->extends('layouts.main');
    }
}
