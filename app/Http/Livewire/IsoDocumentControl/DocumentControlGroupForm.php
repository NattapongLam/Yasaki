<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use App\Models\IsoDocumentGroup;

class DocumentControlGroupForm extends Component
{
    public $idKey = 0;
    public $doc_grocode;
    public $doc_groname;

    protected $listeners = [
        'editDocumentControlGroup' => 'edit',
        'btnCreateDocumentControlGroup' => 'resetInput'
    ];

    protected $rules = [
        'doc_grocode' => 'required',
        'doc_groname' => 'required'
    ];

    protected $messages = [
        'doc_grocode.required' => 'กรุณากรอกใส่ข้อมูล',
        'doc_groname.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function edit($id)
    {
        $docgroup = IsoDocumentGroup::findOrFail($id);
        $this->idKey = $docgroup->id;
        $this->doc_grocode = $docgroup->doc_grocode;
        $this->doc_groname = $docgroup->doc_groname;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('doc_grocode');
        $this->reset('doc_groname');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        IsoDocumentGroup::updateOrCreate([
            'id' => $this->idKey
        ],[
            'doc_grocode' => $this->doc_grocode,
            'doc_groname' => $this->doc_groname,
        ]);
        $this->resetInput();
        $this->emit("refreshDocumentControlGroup");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control.document-control-group-form');
    }
}
