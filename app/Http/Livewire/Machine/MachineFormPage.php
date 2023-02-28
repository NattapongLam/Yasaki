<?php

namespace App\Http\Livewire\Machine;

use App\Models\Machine;
use Livewire\Component;
use App\Models\MachineGroup;

class MachineFormPage extends Component
{
    public $idKey = 0;
    public $mc_code;
    public $mc_name;
    public $mc_brand;
    public $mc_size;
    public $mc_date;
    public $mc_remark;
    public $mc_status = 1;
    public $mc_pdt = 1;
    public $mcgroup_id;
    
    protected $rules = [
        'mc_code' => "required",
        'mc_name' => "required",
        'mcgroup_id' => "required",
    ];

    protected $messages = [
        'mc_code.required' => "กรุณาระบุรหัสเครื่องจักร",
        'mc_name.required' => "กรุณาระบุชื่อเครื่องจักร",
        'mcgroup_id.required' => "กรุณาเลือกกลุ่มเครื่องจักร",
    ];
    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('mc_code');
        $this->reset('mc_name');
        $this->reset('mc_brand');
        $this->reset('mc_size');
        $this->reset('mc_date');
        $this->reset('mc_remark');
        $this->reset('mc_status');
        $this->reset('mc_pdt');
        $this->reset('mcgroup_id');
    }
    public function mount($id = 0)
    {
        if($id > 0)
        {
            $mc = Machine::findOrFail($id);
            $this->idKey = $mc->id;
            $this->mc_code = $mc->mc_code;
            $this->mc_name= $mc->mc_name;
            $this->mc_brand= $mc->mc_brand;
            $this->mc_size= $mc->mc_size;
            $this->mc_date= $mc->mc_date;
            $this->mc_remark= $mc->mc_remark;
            $this->mc_status= $mc->mc_status;
            $this->mc_pdt= $mc->mc_pdt;
            $this->mcgroup_id= $mc->mcgroup_id;
        }
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        Machine::updateOrCreate([
            'id' => $this->idKey
        ],[
            'mc_code'=> $this->mc_code,
            'mc_name'=> $this->mc_name,
            'mc_brand'=> $this->mc_brand,
            'mc_size'=> $this->mc_size,
            'mc_date'=> $this->mc_date,
            'mc_remark'=> $this->mc_remark,
            'mc_status'=> $this->mc_status,
            'mc_pdt'=> $this->mc_pdt,
            'mcgroup_id'=> $this->mcgroup_id,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('machine.list')
        ]);
    }


    public function render()
    {
        return view('livewire.machine.machine-form-page',[
            'mcgroup'  => MachineGroup::where('gruo_status',1)->get(),
        ])->extends('layouts.main');
    }
}
