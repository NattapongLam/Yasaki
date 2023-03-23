<?php

namespace App\Http\Livewire\LeaveDocunoApproval;

use Livewire\Component;
use App\Models\LeaveDocList;

class LeaveDocunoApprovalForm extends Component
{
    public $idKey=0;
    public $sub=[];
    public $lsta_id=3;
    public $ldoc_appsave;
    public $ldoc_appdesc;

    protected $listeners = [
        'editLeaveApproval' => 'edit',
    ];

    public function edit($id)
    {
        $lave = LeaveDocList::findOrFail($id);
        $this->idKey = $lave->id;
    }

    protected $rules = [
        'lsta_id' => 'required',
        'ldoc_appdesc' => 'required'
    ];

    protected $messages = [
        'lsta_id.required' => 'กรุณากรอกใส่ข้อมูล',
        'ldoc_appdesc.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('lsta_id');
        $this->reset('ldoc_appdesc');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        LeaveDocList::updateOrCreate([
            'id' => $this->idKey
        ],[
            'lsta_id' => $this->lsta_id,
            'ldoc_appdesc' => $this->ldoc_appdesc,
            'ldoc_appsave' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('leaveapproval.list')
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        if($this->idKey){
            $emp = LeaveDocList::where('id',$this->idKey)->first();
            $this->sub = LeaveDocList::leftjoin('leave_configs','leave_doc_lists.lconf_id','=','leave_configs.id')
            ->leftjoin('leave_types','leave_doc_lists.ltype_id','=','leave_types.id')
            ->where('lsta_id','<>',2)
            ->where('employee_code',$emp->employee_code)
            ->get();
        }
        return view('livewire.leave-docuno-approval.leave-docuno-approval-form',[
            'sub' => $this->sub
        ]);
    }
}
