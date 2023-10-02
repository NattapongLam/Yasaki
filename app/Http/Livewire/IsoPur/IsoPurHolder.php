<?php

namespace App\Http\Livewire\IsoPur;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPurHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PUR')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%PUR%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','PUR')
        ->get();
        return view('livewire.iso-pur.iso-pur-holder')->extends('layouts.main');
    }
}
