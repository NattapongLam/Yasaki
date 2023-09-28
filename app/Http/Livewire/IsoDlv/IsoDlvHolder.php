<?php

namespace App\Http\Livewire\IsoDlv;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoDlvHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','DLV')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%DLV')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','DLV')
        ->get();
        return view('livewire.iso-dlv.iso-dlv-holder')->extends('layouts.main');
    }
}
