<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use App\Models\IsoIctComputerList;

class DocumentControlIctForm extends Component
{
    public $idKey = 0;
    public $com_listno;
    public $com_name;
    public $com_ip;
    public $com_desc;
    public $com_users;
    public $com_locat;
    public $com_type;
    public $com_status="ใช้งาน";
    public $com_os;
    public $com_ramrk;

    protected $listeners = [
        'editDocumentControlIct' => 'edit',
        'btnCreateDocumentControlIct' => 'resetInput'
    ];

    public function edit($id)
    {
        $comlist = IsoIctComputerList::findOrFail($id);
        $this->idKey = $comlist->id;
        $this->com_listno = $comlist->com_listno;
        $this->com_name = $comlist->com_name;
        $this->com_ip = $comlist->com_ip;
        $this->com_users = $comlist->com_users;
        $this->com_locat = $comlist->com_locat;
        $this->com_type = $comlist->com_type;
        $this->com_status = $comlist->com_status;
        $this->com_os = $comlist->com_os;
        $this->com_desc = $comlist->com_desc;
        $this->com_ramrk = $comlist->com_ramrk;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('com_listno');
        $this->reset('com_name');
        $this->reset('com_ip');
        $this->reset('com_users');
        $this->reset('com_locat');
        $this->reset('com_type');
        $this->reset('com_status');
        $this->reset('com_os');
        $this->reset('com_ramrk');
    }

    public function save()
    {
        IsoIctComputerList::updateOrCreate([
            'id' => $this->idKey
        ],[
            'com_listno' => $this->com_listno,
            'com_name' => $this->com_name,
            'com_ip' => $this->com_ip,
            'com_users' => $this->com_users,
            'com_locat' => $this->com_locat,
            'com_type' => $this->com_type,
            'com_status' => $this->com_status,
            'com_os' => $this->com_os,
            'com_ramrk' => $this->com_ramrk,
            'com_desc' => $this->com_desc,
            'com_save' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->emit("refreshDocumentControlIct");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control-ict.document-control-ict-form');
    }
}
