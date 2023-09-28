<?php

namespace App\Http\Livewire\IsoAsb;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoAsbHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','ASB')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%ASB')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','ASB')
        ->get();
        return view('livewire.iso-asb.iso-asb-holder')->extends('layouts.main');
    }
}
