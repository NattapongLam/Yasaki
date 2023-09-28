<?php

namespace App\Http\Livewire\IsoHtp;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoHtpHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','HTP')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%HTP')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','HTP')
        ->get();
        return view('livewire.iso-htp.iso-htp-holder')->extends('layouts.main');
    }
}
