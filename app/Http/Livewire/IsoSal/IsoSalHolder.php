<?php

namespace App\Http\Livewire\IsoSal;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoSalHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','SAL')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%SAL')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','SAL')
        ->get();
        return view('livewire.iso-sal.iso-sal-holder')->extends('layouts.main');
    }
}
