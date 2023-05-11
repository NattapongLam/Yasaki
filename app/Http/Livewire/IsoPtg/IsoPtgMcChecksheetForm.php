<?php

namespace App\Http\Livewire\IsoPtg;

use Livewire\Component;
use App\Models\EmployeeList;
use Illuminate\Support\Facades\DB;
use App\Models\MachineChecksheetDt;
use App\Models\MachineChecksheetHd;
use App\Models\MachineChecksheetLg;

class IsoPtgMcChecksheetForm extends Component
{
    public $idKey = 0;
    public $checksheetmc_hd_docuno;
    public $ms_machine_code;
    public $ms_machine_name;
    public $checksheetmc_hd_save;
    public $checksheetmc_hd_note;
    public $checksheetmc_hd_filename;

    public $chkdt =[];
    public $chkemp =[];
    public $emp =[];

    public function mount($id = 0)
    {
        $hd = MachineChecksheetHd::findOrFail($id);
        $this->idKey = $hd->id;
        $this->ms_machine_code = $hd->ms_machine_code;
        $this->ms_machine_name = $hd->ms_machine_name;
        $this->checksheetmc_hd_docuno = $hd->checksheetmc_hd_docuno;
        $this->checksheetmc_hd_save = $hd->checksheetmc_hd_save;
        $this->checksheetmc_hd_filename = $hd->checksheetmc_hd_filename;
    }

    public function render()
    {
        if($this->idKey){
            $pic = DB::table('machine_checksheet_hds')->where('id',$this->idKey)->first();
            $pic = $pic->checksheetmc_hd_filename;
            $this->chkdt = MachineChecksheetDt::where('checksheetmc_hd_docuno',$this->checksheetmc_hd_docuno)->orderBy('machinecheck_dt_listno','asc')->get();
            $this->chkemp = MachineChecksheetLg::where('checksheetmc_hd_docuno',$this->checksheetmc_hd_docuno)->get();
            $this->emp = EmployeeList::where('department_name','ทำสี(PTG)')->get();
        }
        return view('livewire.iso-ptg.iso-ptg-mc-checksheet-form',[
            'pic' => $pic,
            'chkdt' => $this->chkdt,
            'chkemp' => $this->chkemp,
            'emp' => $this->emp
        ])->extends('layouts.main');
    }
}
