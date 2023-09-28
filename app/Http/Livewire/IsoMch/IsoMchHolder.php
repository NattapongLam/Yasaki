<?php

namespace App\Http\Livewire\IsoMch;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMchHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','MCH')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%MCH')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','MCH')
        ->get();
        return view('livewire.iso-mch.iso-mch-holder')->extends('layouts.main');
    }
}
