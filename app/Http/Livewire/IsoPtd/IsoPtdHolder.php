<?php

namespace App\Http\Livewire\IsoPtd;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPtdHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PDT')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%PDT')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','PDT')
        ->get();
        return view('livewire.iso-ptd.iso-ptd-holder')->extends('layouts.main');
    }
}
