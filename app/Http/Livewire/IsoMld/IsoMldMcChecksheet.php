<?php

namespace App\Http\Livewire\IsoMld;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class IsoMldMcChecksheet extends Component
{
    public $mcchk = [];
    
    public function render()
    {
        $this->mcchk = DB::table('vw_checksheetmc_hd')
        ->where('ms_machine_group_code','MLD')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('monthcheck','desc')
        ->get();
        return view('livewire.iso-mld.iso-mld-mc-checksheet')->extends('layouts.main');
    }
}
