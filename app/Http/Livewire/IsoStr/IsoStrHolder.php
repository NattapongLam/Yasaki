<?php

namespace App\Http\Livewire\IsoStr;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoStrHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','STR')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%STR%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','STR')
        ->get();
        return view('livewire.iso-str.iso-str-holder')->extends('layouts.main');
    }
}
