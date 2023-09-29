<?php

namespace App\Http\Livewire\IsoPtg;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPtgHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PTG')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%PTG%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','PTG')
        ->get();
        return view('livewire.iso-ptg.iso-ptg-holder')->extends('layouts.main');
    }
}
