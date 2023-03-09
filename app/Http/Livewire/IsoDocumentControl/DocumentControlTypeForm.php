<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use App\Models\IsoDocumentType;

class DocumentControlTypeForm extends Component
{
    public $idKey = 0;
    public $doc_typcode;
    public $doc_typname;

    protected $listeners = [
        'editDocumentControlType' => 'edit',
        'btnCreateDocumentControlType' => 'resetInput'
    ];
    protected $rules = [
        'doc_typcode' => 'required',
        'doc_typname' => 'required'
    ];

    protected $messages = [
        'doc_typcode.required' => 'กรุณากรอกใส่ข้อมูล',
        'doc_typname.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function edit($id)
    {
        $doctype = IsoDocumentType::findOrFail($id);
        $this->idKey = $doctype->id;
        $this->doc_typcode = $doctype->doc_typcode;
        $this->doc_typname = $doctype->doc_typname;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('doc_typcode');
        $this->reset('doc_typname');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        IsoDocumentType::updateOrCreate([
            'id' => $this->idKey
        ],[
            'doc_typcode' => $this->doc_typcode,
            'doc_typname' => $this->doc_typname,
        ]);
        $this->resetInput();
        $this->emit("refreshDocumentControlType");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }
    public function render()
    {
        return view('livewire.iso-document-control.document-control-type-form');
    }
}
