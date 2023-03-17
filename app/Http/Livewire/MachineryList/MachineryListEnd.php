<?php

namespace App\Http\Livewire\MachineryList;

use Livewire\Component;
use App\Models\MachineryList;
use App\Models\MachineryListSub;

class MachineryListEnd extends Component
{
    public $idKey = 0;
    public $machinery_hd_docuno;
    public $machinery_dt_listno=1;
    public $machinery_dt_remark;
    public $machinery_dt_hour;
    public $machinery_dt_date;
    public $machinery_dt_flag=1;
    public $machinery_dt_id=0;
    public $machinery_hd_id=0;
    
    protected $listeners = [
        'editMachineryListEnd' => 'edit',
        'btnCreateMachineryListEnd' => 'resetInput'
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('machinery_hd_docuno');
        $this->reset('machinery_dt_listno');
        $this->reset('machinery_dt_remark');
        $this->reset('machinery_dt_hour');
        $this->reset('machinery_dt_date');
        $this->reset('machinery_dt_flag');
        $this->reset('machinery_dt_id');
        $this->reset('machinery_hd_id');
    }
    public function edit($id)
    {
        $mcsub = MachineryListSub::findOrFail($id);
        $this->idKey = $mcsub->id;
        $this->machinery_hd_docuno = $mcsub->machinery_hd_docuno;
        $this->machinery_dt_remark = $mcsub->machinery_dt_remark;
        $this->machinery_dt_hour = $mcsub->machinery_dt_hour;
        $this->machinery_dt_date = $mcsub->machinery_dt_date;
        $this->machinery_dt_flag = $mcsub->machinery_dt_flag;
    }

    public function save()
    {
        MachineryListSub::updateOrCreate([
            'id' => $this->idKey
        ],[
            'machinery_hd_docuno'=> $this->machinery_hd_docuno,
            'machinery_dt_remark'=> $this->machinery_dt_remark,
            'machinery_dt_hour'=> $this->machinery_dt_hour,
            'machinery_dt_date'=> $this->machinery_dt_date,
            'machinery_dt_flag'=> $this->machinery_dt_flag,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.machinery-list.machinery-list-end');
    }
}
