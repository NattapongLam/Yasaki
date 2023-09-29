<?php

namespace App\Http\Livewire\IsoPkg;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPkgHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PKG')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%PKG%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','PKG')
        ->get();
        return view('livewire.iso-pkg.iso-pkg-holder')->extends('layouts.main');
    }
}
