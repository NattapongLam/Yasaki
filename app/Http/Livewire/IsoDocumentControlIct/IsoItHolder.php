<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IsoItHolder extends Component
{
    public $holder = [];
    public $policy = [];
    public $kpi = [];
    
    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','IT')
        ->get();
        $this->policy = DB::table('vw_iso_policy_lsits')
        ->where('pol_name','like','%ICT')
        ->where('pol_status',true)
        ->get();
        $this->kpi = DB::table('vw_iso_ict_monthkpis')
        ->where('dep_name','IT')
        ->get();
        return view('livewire.iso-document-control-ict.iso-it-holder')->extends('layouts.main');
    }
}
