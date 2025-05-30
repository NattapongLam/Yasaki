<?php

namespace App\Http\Livewire\IsoMch;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoMchMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','MCH')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthcheck','desc')
        ->get();
        return view('livewire.iso-mch.iso-mch-mc-checksheet')->extends('layouts.main');
    }
}
