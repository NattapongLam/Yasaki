<?php

namespace App\Http\Livewire\IsoMtn;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoMtnHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];
    public $docs = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','MTN')
        ->get();
        $this->policy = DB::table('iso_policy_lsits')
        ->where('pol_name','like','%MTN%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('iso_ict_monthkpis')
        ->where('dep_name','MTN')
        ->get();
        $this->docs =DB::table('iso_master_lists')
        ->where('iso_doculist_code','like','%MTN%')
        ->where('iso_docustatus_name','<>','ยกเลิก')
        ->get();
        return view('livewire.iso-mtn.iso-mtn-holder')->extends('layouts.main');
    }
}
