<?php

namespace App\Http\Livewire\LeaveApproval;

use Livewire\Component;
use App\Models\EmployeeList;
use App\Models\LeaveApprovalDt;
use App\Models\LeaveApprovalHd;
use Illuminate\Support\Facades\DB;

class LeaveApprovalListForm extends Component
{
    public $idKey=0;
    public $leavapp_code;
    public $leavapp_name;
    public $leavapp_remark;
    public $leavapp_status=1;


    public $emps = [];
    public $i = 1;

    public $checkEmp = [];

    protected $listeners =[
        'selectedEmp' => 'selectedEmp'
    ];

    public function selectedEmp($id)
    {
        $emp = EmployeeList::findOrFail($id);
        if(!empty($this->checkEmp) && in_array($emp->id,$this->checkEmp)){
            return;
        }
        $this->emps[] = [
            'emp_id' => $emp->id,
            'leavsub_empcode' => $emp->employee_code,
            'leavsub_empname' => $emp->employee_fullname,
            'leavsub_type' => 1
        ];
        array_push($this->checkEmp,$emp->id);
    }
    public function deleteRow($index)
    {
        unset($this->emps[$index]);
    }

    protected $rules = [
        'leavapp_code' => "required",
        'leavapp_name' => "required",
    ];
    protected $messages = [
        'leavapp_code.required' => "กรุณาใส่ข้อมูล",
        'leavapp_name.required' => "กรุณาใส่ข้อมูล",
    ];

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('leavapp_code');
        $this->reset('leavapp_name');
        $this->reset('leavapp_remark');
        $this->reset('leavapp_status');
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $hd = LeaveApprovalHd::findOrFail($id);
            $this->idKey = $hd->id;
            $this->leavapp_code = $hd->leavapp_code;
            $this->leavapp_name = $hd->leavapp_name;
            $this->leavapp_remark = $hd->leavapp_remark;
            $this->leavapp_status = $hd->leavapp_status;
            foreach ($hd->emps as $key => $value) {
                $this->emps[] = [
                    'emp_id' => $value->emp_id,
                    'leavsub_empcode' =>  $value->leavsub_empcode,
                    'leavsub_empname' => $value->leavsub_empname,
                    'leavsub_type' => $value->leavsub_type,
                ];
            }
        }
    }
    public function save()
    {
        //dd($this->leavsub_empcode);
        $this->validate($this->rules,$this->messages);
        DB::beginTransaction();
        try {
            $hd =  LeaveApprovalHd::updateOrCreate([
                'id' => $this->idKey
            ],[
                'leavapp_code'=> $this->leavapp_code,
                'leavapp_name'=> $this->leavapp_name,
                'leavapp_remark'=> $this->leavapp_remark,
                'leavapp_save'=> auth()->user()->name,
                'leavapp_status'=> $this->leavapp_status,             
            ]);
            DB::table('leave_approval_dts')->where('leavapp_id',$hd->id)->delete();
            foreach($this->emps as $key => $value){
                LeaveApprovalDt::Create([
                    'emp_id' => $value['emp_id'],
                    'leavsub_empcode' =>  $value['leavsub_empcode'],
                    'leavsub_empname' => $value['leavsub_empname'],
                    'leavsub_type' => $value['leavsub_type'],
                    'leavapp_id' =>  $hd->id,
                ]);
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
        }      
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('leaveapproval.list')
        ]);
    }

    public function render()
    {
        return view('livewire.leave-approval.leave-approval-list-form')->extends('layouts.main');
    }
}
