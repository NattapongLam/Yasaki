<?php

namespace App\Http\Livewire\IsoPur;

use Livewire\Component;
use App\Models\IsoHolderList;

class IsoPurHolderForm extends Component
{
    public $idKey = 0;
    public $iso_doculist_code;
    public $iso_doculist_name;
    public $iso_docuholder_status = 3;

    protected $listeners = [
        'editPurHolder' => 'edit',
    ];

    public function edit($id)
    {
        $this->resetInput();
        $doc = IsoHolderList::where('emp_department_refcode','PUR')->findOrFail($id);
        $this->idKey = $doc->id;
        $this->iso_doculist_code = $doc->iso_doculist_code;
        $this->iso_doculist_name = $doc->iso_doculist_name;
        $this->iso_docuholder_status = $doc->iso_docuholder_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('iso_doculist_code');
        $this->reset('iso_doculist_name');
        $this->reset('iso_docuholder_status');
    }

    public function save()
    {
        IsoHolderList::where('id',$this->idKey)->update([
            'iso_docuholder_status' => $this->iso_docuholder_status,
            'recipient_person' => auth()->user()->name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('isopur.list')
        ]);
        $this->emit('modalHide');
    }
    public function render()
    {
        return view('livewire.iso-pur.iso-pur-holder-form');
    }
}
