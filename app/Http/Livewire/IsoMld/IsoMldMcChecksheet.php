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
        $this->mcchk = DB::table('machine_checksheet_hds')
        ->where('ms_machine_group_code','MLD')
        ->whereYear('checksheetmc_hd_date',Carbon::now()->year)
        ->orderBy('checksheetmc_hd_date','asc')
        ->get();
        return view('livewire.iso-mld.iso-mld-mc-checksheet')->extends('layouts.main');
    }
}
