<?php

namespace App\Http\Livewire\IsoPkg;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoPkgMcChecksheet extends Component
{
    public $mcchk = [];

    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','PKG')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthcheck','desc')
        ->get();
        return view('livewire.iso-pkg.iso-pkg-mc-checksheet')->extends('layouts.main');
    }
}
