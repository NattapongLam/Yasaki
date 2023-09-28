<?php

namespace App\Http\Livewire\IsoQcc;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoQccHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','QCC')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%QCC')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','QCC')
        ->get();
        return view('livewire.iso-qcc.iso-qcc-holder')->extends('layouts.main');
    }
}
