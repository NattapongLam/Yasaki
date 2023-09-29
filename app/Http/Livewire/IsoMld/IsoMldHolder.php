<?php

namespace App\Http\Livewire\IsoMld;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMldHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','MLD')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%MLD%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','MLD')
        ->get();
        return view('livewire.iso-mld.iso-mld-holder')->extends('layouts.main');
    }
}
