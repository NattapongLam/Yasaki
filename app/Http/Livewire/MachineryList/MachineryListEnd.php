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
        'btnCreateMachineryListEnd' => 'resetInput',
        'refreshMachineryListEnd' => '$refresh'
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
    public function mount($id = 0)
    {
        if($id > 0)
        {
            $doc = MachineryList::where('id',$id)->first();
            $this->machinery_hd_docuno = $doc->machinery_hd_docuno;
            $this->machinery_dt_hour = 0.00;
            $this->machinery_dt_date = date('Y-m-d');
        }
    }
    public function save()
    {
        MachineryListSub::updateOrCreate([
            'id' => $this->idKey
        ],[
            'machinery_hd_docuno'=> $this->machinery_hd_docuno,
            'machinery_dt_listno'=> 1,
            'machinery_dt_remark'=> $this->machinery_dt_remark,
            'machinery_dt_hour'=> $this->machinery_dt_hour,
            'machinery_dt_date'=> $this->machinery_dt_date,
            'machinery_dt_flag'=> $this->machinery_dt_flag,
            'machinery_dt_id'=> 0,
            'machinery_hd_id'=> 0,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('machinerylist.list')
        ]);
    }

    public function render()
    {
        return view('livewire.machinery-list.machinery-list-end')->extends('layouts.main');
    }
}
