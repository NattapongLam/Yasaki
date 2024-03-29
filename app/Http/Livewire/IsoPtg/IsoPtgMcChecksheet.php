<?php

namespace App\Http\Livewire\IsoPtg;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoPtgMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','PTG')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthtype','desc')
        ->get();
        return view('livewire.iso-ptg.iso-ptg-mc-checksheet')->extends('layouts.main');
    }
}
