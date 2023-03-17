<?php

namespace App\Http\Livewire\MachineryList;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\EmployeeList;
use App\Models\MachineryList;
use App\Models\MachineSystem;
use Livewire\WithFileUploads;
use App\Models\DepartmentList;
use App\Models\MachineService;
use App\Models\MachineryListSub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use App\Http\Livewire\Field;
use Illuminate\Http\Request;


class MachineryListEdit extends Component
{
    use WithFileUploads;
    
    public $idKey = 0;
    public $machinery_hd_date;
    public $machinery_hd_docuno;
    public $machinery_hd_type="ด่วน";
    public $ms_machine_code;
    public $ms_machine_name;
    public $department_name;
    public $machinery_hd_lcaol;
    public $ms_machine_system_name;
    public $ms_machine_service_name;
    public $machinery_hd_save;
    public $machinery_hd_note;
    public $machinery_hd_number;
    public $machinery_hd_checksave;
    public $machinery_hd_checkdate;
    public $machinery_hd_checknote;
    public $machinery_hd_status_id=3;
    public $machinery_hd_personsave;
    public $vendor_code;
    public $vendor_name;
    public $machinery_hd_refdocuno;
    public $machinery_hd_pic1;
    public $machinery_hd_pic2;

    public $idSubKey;
    public $machinery_dt_remark;
    public $machinery_dt_hour;
    public $machinery_dt_date;

    public $listsubs =[];
    public $i = 1;

    public function delListsubRow($i)
    {
        unset($this->listsubs[$i]);
    }

    public function addListsub($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->listsubs ,$i);
    }

    protected $rules = [
        'machinery_hd_personsave' => "required",
        'machinery_hd_checknote' => "required",
        'machinery_hd_type' => "required",
        'ms_machine_name' => "required",
        'department_name' => "required",
        'machinery_hd_lcaol' => "required",
        'ms_machine_system_name' => "required",
        'ms_machine_service_name' => "required",
        'machinery_hd_status_id' => "required",
        'machinery_hd_note' => "required",    
        'machinery_dt_remark' => "required",
        'machinery_dt_hour' => "required",
        'machinery_dt_date' => "required",  
    ];


    protected $messages = [
        'machinery_hd_personsave.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_checknote.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_type.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_name.required' => "กรุณาใส่ข้อมูล",
        'department_name.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_lcaol.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_system_name.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_service_name.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_status_id.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_note.required' => "กรุณาใส่ข้อมูล",
        'machinery_dt_remark.required' => "กรุณาใส่ข้อมูล",
        'machinery_dt_hour.required' => "กรุณาใส่ข้อมูล",
        'machinery_dt_date.required' => "กรุณาใส่ข้อมูล",
    ];


    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('machinery_hd_date');
        $this->reset('machinery_hd_docuno');
        $this->reset('machinery_hd_status_id');
        $this->reset('machinery_hd_number');
        $this->reset('machinery_hd_type');
        $this->reset('ms_machine_code');
        $this->reset('ms_machine_name');
        $this->reset('department_name');
        $this->reset('machinery_hd_lcaol');
        $this->reset('ms_machine_system_name');
        $this->reset('ms_machine_service_name');
        $this->reset('machinery_hd_note');
    }
    public function resetSubsInput()
    {
        $this->reset('idSubKey');
        $this->reset('machinery_dt_remark');
        $this->reset('machinery_dt_hour');
        $this->reset('machinery_dt_date');
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $mcdocu = MachineryList::findOrFail($id);
            $this->idKey = $mcdocu->id;
            $this->machinery_hd_date = $mcdocu->machinery_hd_date;
            $this->machinery_hd_docuno = $mcdocu->machinery_hd_docuno;
            $this->machinery_hd_status_id= 3;
            $this->machinery_hd_number= $mcdocu->machinery_hd_number;
            $this->machinery_hd_type= $mcdocu->machinery_hd_type;
            $this->ms_machine_code = $mcdocu->ms_machine_code;
            $this->ms_machine_name = $mcdocu->ms_machine_name;
            $this->department_name = $mcdocu->department_name;
            $this->machinery_hd_lcaol= $mcdocu->machinery_hd_lcaol;
            $this->ms_machine_system_name = $mcdocu->ms_machine_system_name;
            $this->ms_machine_service_name= $mcdocu->ms_machine_service_name;
            $this->machinery_hd_note= $mcdocu->machinery_hd_note;
        }
    }
    public function storeImage()
    {
        if(!$this->machinery_hd_pic2){
            return null;
        }
        $img = ImageManagerStatic::make($this->machinery_hd_pic2)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('machinerylist')->put($name,$img);
        return $name;
    }
    public function save()
    {
        $this->validate($this->rules,$this->messages);
        DB::beginTransaction();
        try {
            $mclist =  MachineryList::updateOrCreate([
                'id' => $this->idKey
            ],[
                'machinery_hd_checkdate'=> $this->machinery_hd_checkdate,
                'machinery_hd_personsave'=> $this->machinery_hd_personsave,
                'machinery_hd_status_id'=> $this->machinery_hd_status_id,
                'machinery_hd_checksave'=> auth()->user()->name,
                'machinery_hd_checknote'=> $this->machinery_hd_checknote,
                'machinery_hd_refdocuno'=> $this->machinery_hd_refdocuno,
                'machinery_hd_pic2' => $this->storeImage()                
            ]);
            foreach($this->machinery_dt_date as $key => $value){
                MachineryListSub::Create([
                    'machinery_hd_id' => 0,
                    'machinery_dt_id' => 0,
                    'machinery_dt_listno' => $key+1,
                    'machinery_dt_flag' => true,
                    'machinery_dt_remark' => $this->machinery_dt_remark[$key],
                    'machinery_dt_hour' =>  $this->machinery_dt_hour[$key],
                    'machinery_dt_date' => $this->machinery_dt_date[$key],
                    'machinery_hd_docuno' => $this->machinery_hd_docuno,
                    'mclist_id' => $this->idKey
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
            'url' =>  $this->idKey > 0 ? route('machinerylist.edit', $mclist->id) : route('machinerylist.list')
        ]);
    }
    public function saveSub(){
        $this->validate($this->ruleSubs,$this->messageSubs);
        MachineryListSub::updateOrCreate([
            'id' => $this->idSubKey
            ],[
            'machinery_hd_docuno'=> $this->machinery_hd_docuno,
            'machinery_dt_listno'=> 1,
            'machinery_dt_remark'=> $this->machinery_dt_remark,
            'machinery_dt_hour'=> $this->machinery_dt_hour,
            'machinery_dt_date'=> $this->machinery_dt_date,
            'machinery_dt_flag'=> true,
            'machinery_dt_id'=> 0,
            'machinery_hd_id'=> 0,
            'mclist_id' => $this->idKey
        ]);
        $this->resetSubsInput();
    }

    public function render()
    {
        //$list = MachineryListSub::where('machinery_hd_docuno',$this->machinery_hd_docuno)->where('machinery_dt_flag',true)->get();
        $this->machinery_hd_checkdate = date('Y-m-d');
        return view('livewire.machinery-list.machinery-list-edit',[
            'dep' => DepartmentList::get(),
            'sys' => MachineSystem::get(),
            'ser' => MachineService::get(),
            'emp' => EmployeeList::where('department_name','ซ่อมบำรุง(MTN)')->get(),
            //'doc' => $this->idKey,
            //'list' => $list,
            ])->extends('layouts.main');
    }
}
