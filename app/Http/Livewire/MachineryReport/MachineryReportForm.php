<?php

namespace App\Http\Livewire\MachineryReport;

use Livewire\Component;
use App\Models\MachineryList;
use App\Models\MachineryListSub;

class MachineryReportForm extends Component
{
    public $idKey = 0;
    public $ms_machine_code;
    public $ms_machine_name;
    public $machinery_hd_checksave;
    public $machinery_hd_checkdate;
    public $machinery_hd_checknote;
    public $machinery_hd_personsave;

    protected $listeners = [
        'editMachineryReport' => 'edit',
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('ms_machine_code');
        $this->reset('ms_machine_name');
        $this->reset('machinery_hd_checkdate');
        $this->reset('machinery_hd_checksave');
        $this->reset('machinery_hd_personsave');
        $this->reset('machinery_hd_checknote');
    }

    public function edit($id)
    {
        $hd = MachineryList::findOrFail($id);
        $this->idKey = $hd->id;
        $this->ms_machine_code = $hd->ms_machine_code;
        $this->ms_machine_name = $hd->ms_machine_name;
        $this->machinery_hd_checkdate = $hd->machinery_hd_checkdate;
        $this->machinery_hd_checksave = $hd->machinery_hd_checksave;
        $this->machinery_hd_personsave = $hd->machinery_hd_personsave;
        $this->machinery_hd_checknote = $hd->machinery_hd_checknote;
    }

    public function save()
    {
        MachineryList::updateOrCreate([
            'id' => $this->idKey
        ],[
            'machinery_hd_status_id' => 4,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('machineryreport.list')
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.machinery-report.machinery-report-form');
    }
}
