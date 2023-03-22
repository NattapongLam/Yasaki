<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use App\Models\IsoIctPlanHd;
use App\Models\IsoIctChecksheet;
use App\Models\IsoIctComputerList;

class DocumentControlIctChecksheetForm extends Component
{
    
    public $idKey = 0;
    public $cit_date;
    public $com_id;
    public $com_name;
    public $cit_check1=1;
    public $cit_check2=1;
    public $cit_check3=1;
    public $cit_check4=1;
    public $cit_check5=1;
    public $cit_remark;
    public $cit_save;
    public $cit_approval;

    protected $listeners = [
        'editIctChecksheet' => 'edit',
        'btnCreateIctChecksheet' => 'resetInput'
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('cit_date');
        $this->reset('com_id');
        $this->reset('com_name');
        $this->reset('cit_check1');
        $this->reset('cit_check2');
        $this->reset('cit_check3');
        $this->reset('cit_check4');
        $this->reset('cit_check5');
        $this->reset('cit_remark');
    }

    public function edit($id)
    {
        $comlist = IsoIctChecksheet::findOrFail($id);
        $this->idKey = $comlist->id;
        $this->cit_date = $comlist->cit_date;
        $this->com_id = $comlist->com_id;
        $this->com_name = $comlist->com_name;
        $this->cit_check1 = $comlist->cit_check1;
        $this->cit_check2 = $comlist->cit_check2;
        $this->cit_check3 = $comlist->cit_check3;
        $this->cit_check4 = $comlist->cit_check4;
        $this->cit_check5 = $comlist->cit_check5;
        $this->cit_remark = $comlist->cit_remark;
    }
    public function save()
    {
        $com = IsoIctComputerList::where('id',$this->com_id)->first();
        IsoIctChecksheet::updateOrCreate([
            'id' => $this->idKey
        ],[
            'cit_date' => $this->cit_date,
            'com_id' => $this->com_id,
            'com_name' => $com->com_name,
            'cit_check1' => $this->cit_check1,
            'cit_check2' => $this->cit_check2,
            'cit_check3' => $this->cit_check3,
            'cit_check4' => $this->cit_check4,
            'cit_check5' => $this->cit_check5,
            'cit_remark' => $this->cit_remark,
            'cit_save' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->emit("refreshIctChecksheet");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control-ict.document-control-ict-checksheet-form',[
            'plan' => IsoIctPlanHd::join('iso_ict_plan_dts','iso_ict_plan_hds.id','=','iso_ict_plan_dts.planhd_id')
            ->where('year_name','2023')->get()
        ]);
    }
}
