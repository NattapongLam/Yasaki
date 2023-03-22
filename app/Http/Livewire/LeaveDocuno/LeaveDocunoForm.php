<?php

namespace App\Http\Livewire\LeaveDocuno;

use Livewire\Component;
use App\Models\LeaveType;
use App\Models\LeaveConfig;
use Illuminate\Support\Str;
use App\Models\EmployeeList;
use App\Models\LeaveDocList;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class LeaveDocunoForm extends Component
{
    use WithFileUploads;
    
    public $idKey = 0;
    public $ldoc_datestart;
    public $ldoc_dateend;
    public $lconf_id;
    public $ltype_id;
    public $employee_code;
    public $employee_fullname;
    public $approval_id=0;
    public $ldoc_fileup;
    public $ldoc_reamrk;
    public $lsta_id=1;
    
    protected $rules = [
        'ldoc_datestart' => "required",
        'ldoc_dateend' => "required",
        'lconf_id' => "required",
        'ltype_id' => "required",
        'employee_code' => "required",
        'ldoc_reamrk' => "required",
    ];

    protected $messages = [
        'ldoc_datestart.required' => "กรุณาระบุข้อมูล",
        'ldoc_dateend.required' => "กรุณาระบุข้อมูล",
        'lconf_id.required' => "กรุณาระบุข้อมูล",
        'ltype_id.required' => "กรุณาระบุข้อมูล",
        'employee_code.required' => "กรุณาระบุข้อมูล",
        'ldoc_reamrk.required' => "กรุณาระบุข้อมูล",
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('ldoc_datestart');
        $this->reset('ldoc_dateend');
        $this->reset('lconf_id');
        $this->reset('ltype_id');
        $this->reset('employee_code');
        $this->reset('ldoc_fileup');
        $this->reset('ldoc_reamrk');
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $lave = LeaveDocList::findOrFail($id);
            $this->idKey = $lave->id;
            $this->ldoc_datestart = $lave->ldoc_datestart;
            $this->ldoc_dateend = $lave->ldoc_dateend;
            $this->lconf_id = $lave->lconf_id;
            $this->ltype_id = $lave->ltype_id;
            $this->employee_code = $lave->employee_code;
            $this->ldoc_fileup = $lave->ldoc_fileup;
            $this->ldoc_reamrk = $lave->ldoc_reamrk;
        }
    }

    public function storeImage()
    {
        if(!$this->ldoc_fileup){
            return null;
        }
        $img = ImageManagerStatic::make($this->ldoc_fileup)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('leavedoc')->put($name,$img);
        return $name;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $emp = EmployeeList::where('employee_code',$this->employee_code)->first();
        LeaveDocList::updateOrCreate([
            'id' => $this->idKey
        ],[
            'ldoc_datestart' => $this->ldoc_datestart,
            'ldoc_dateend'=> $this->ldoc_dateend,
            'lconf_id'=> $this->lconf_id,
            'ltype_id'=> $this->ltype_id,
            'employee_code'=> $this->employee_code,
            'employee_fullname'=> $emp->employee_fullname,
            'approval_id'=> $emp->approval_id,
            'ldoc_fileup'=> $this->storeImage(),
            'ldoc_reamrk'=> $this->ldoc_reamrk,
            'lsta_id'=> 1,
            'ldoc_save' =>  auth()->user()->name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('leavedocuno.list')
        ]);
    }
    public function cancel()
    {
        LeaveDocList::where('id',$this->idKey)->update([
            'lsta_id'=> 2,
            'ldoc_save' =>  auth()->user()->name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'ยกเลิกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('leavedocuno.list')
        ]);
    }

    public function render()
    {
        return view('livewire.leave-docuno.leave-docuno-form',[
            'lcon' => LeaveConfig::get(),
            'ltyp' => LeaveType::get(),
            'emp' => EmployeeList::where('employee_status',true)->get(),
        ])->extends('layouts.main');
    }
}
