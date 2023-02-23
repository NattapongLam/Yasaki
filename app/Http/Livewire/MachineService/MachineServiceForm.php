<?php

namespace App\Http\Livewire\MachineService;

use Livewire\Component;
use App\Models\MachineService;

class MachineServiceForm extends Component
{
    public $idKey = 0;
    public $serv_name;
    public $serv_status = 1;

    protected $listeners = [
        'editMachineService' => 'edit',
        'btnCreateMachineService' => 'resetInput'
    ];

    protected $rules = [
        'serv_name' => 'required'
    ];

    protected $messages = [
        'serv_name.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function edit($id)
    {
        $mcserv = MachineService::findOrFail($id);
        $this->idKey = $mcserv->id;
        $this->serv_name = $mcserv->serv_name;
        $this->serv_status = $mcserv->serv_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('serv_name');
        $this->reset('serv_status');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        MachineService::updateOrCreate([
            'id' => $this->idKey
        ],[
            'serv_name' => $this->serv_name,
            'serv_status' => $this->serv_status
        ]);
        $this->resetInput();
        $this->emit("refreshMachineService");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลบริการแจ้งซ่อมเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.machine-service.machine-service-form');
    }
}
