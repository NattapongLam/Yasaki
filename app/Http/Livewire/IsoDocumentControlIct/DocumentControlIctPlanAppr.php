<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\IsoIctPlanHd;

class DocumentControlIctPlanAppr extends Component
{
    public $idKey = 0;
    public $year_name;
    public $planhd_remark;
    public $planhd_type;
    public $planhd_save;
    public $approval_note;

    protected $listeners = [
        'editControlIctPlanAppr' => 'edit',
        'btnCreateControlIctPlanAppr' => 'resetInput',
        'refreshControlIctPlanAppr' => '$refresh'
    ];

    public function edit($id)
    {
        $plan = IsoIctPlanHd::findOrFail($id);
        $this->idKey = $plan->id;
        $this->year_name = $plan->year_name;
        $this->planhd_remark = $plan->planhd_remark;
        $this->planhd_type = $plan->planhd_type;
        $this->planhd_save = $plan->planhd_save;
        $this->approval_note = $plan->approval_note;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('year_name');
        $this->reset('planhd_remark');
        $this->reset('planhd_type');
        $this->reset('planhd_save');
        $this->reset('approval_note');
    }

    public function save()
    {
        IsoIctPlanHd::updateOrCreate([
            'id' => $this->idKey
        ],[
            'approval_note' => $this->approval_note,
            'approval_save' => auth()->user()->name,
            'approval_date' => Carbon::now(),
        ]);
        $this->resetInput();
        $this->emit("refreshControlIctPlanAppr");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('documentcontrolictplan.list')
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control-ict.document-control-ict-plan-appr');
    }
}
