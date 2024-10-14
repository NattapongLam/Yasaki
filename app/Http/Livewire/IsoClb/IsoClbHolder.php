<?php

namespace App\Http\Livewire\IsoClb;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoClbHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];
    public $docs = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','CLB')
        ->get();
        $this->policy = DB::table('vw_iso_policy_lsits')
        ->where('pol_name','like','%CLB%')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('vw_iso_ict_monthkpis')
        ->where('dep_name','CLB')
        ->get();
        $this->docs =DB::table('iso_master_lists')
        ->where('iso_doculist_code','like','%CLB%')
        ->where('iso_docustatus_name','<>','ยกเลิก')
        ->get();
        return view('livewire.iso-clb.iso-clb-holder')->extends('layouts.main');
    }
}
