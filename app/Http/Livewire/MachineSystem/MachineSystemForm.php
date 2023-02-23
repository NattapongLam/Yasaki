<?php

namespace App\Http\Livewire\MachineSystem;

use Livewire\Component;
use App\Models\MachineSystem;

class MachineSystemForm extends Component
{
    public $idKey = 0;
    public $syst_name;
    public $syst_status = 1;

    protected $listeners = [
        'editMachineSystem' => 'edit',
        'btnCreateMachineSystem' => 'resetInput'
    ];

    protected $rules = [
        'syst_name' => 'required'
    ];

    protected $messages = [
        'syst_name.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function edit($id)
    {
        $mcsyst = MachineSystem::findOrFail($id);
        $this->idKey = $mcsyst->id;
        $this->syst_name = $mcsyst->syst_name;
        $this->syst_status = $mcsyst->syst_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('syst_name');
        $this->reset('syst_status');
    }
    
    public function save()
    {
        $this->validate($this->rules,$this->messages);
        MachineSystem::updateOrCreate([
            'id' => $this->idKey
        ],[
            'syst_name' => $this->syst_name,
            'syst_status' => $this->syst_status
        ]);
        $this->resetInput();
        $this->emit("refreshMachineSystem");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }


    public function render()
    {
        return view('livewire.machine-system.machine-system-form');
    }
}
