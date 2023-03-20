<?php

namespace App\Http\Livewire\IsoPkg;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IsoPkgHolder extends Component
{
    public $holder = [];

    public function render()
    {
        $this->holder = DB::table('vw_iso_holderperson')
        ->where('emp_department_refcode','PKG')
        ->get();
        return view('livewire.iso-pkg.iso-pkg-holder')->extends('layouts.main');
    }
}
