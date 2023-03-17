<?php

namespace App\Http\Livewire\MachineryList;

use App\Models\Machine;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\MachineryList;
use App\Models\MachineSystem;
use Livewire\WithFileUploads;
use App\Models\DepartmentList;
use App\Models\MachineService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class MachineryListForm extends Component
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
    public $machinery_hd_status_id=1;
    public $machinery_hd_personsave;
    public $vendor_code;
    public $vendor_name;
    public $machinery_hd_refdocuno;
    public $machinery_hd_pic1;
    public $machinery_hd_pic2;

    public $mcs =[];

    protected $rules = [
        'machinery_hd_date' => "required",
        'machinery_hd_docuno' => "required",
        'machinery_hd_type' => "required",
        'ms_machine_name' => "required",
        'department_name' => "required",
        'machinery_hd_lcaol' => "required",
        'ms_machine_system_name' => "required",
        'ms_machine_service_name' => "required",
        'machinery_hd_status_id' => "required",
        'machinery_hd_note' => "required",
    ];

    protected $messages = [
        'machinery_hd_date.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_docuno.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_type.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_name.required' => "กรุณาใส่ข้อมูล",
        'department_name.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_lcaol.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_system_name.required' => "กรุณาใส่ข้อมูล",
        'ms_machine_service_name.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_status_id.required' => "กรุณาใส่ข้อมูล",
        'machinery_hd_note.required' => "กรุณาใส่ข้อมูล",
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
    public function storeImage()
    {
        if(!$this->machinery_hd_pic1){
            return null;
        }
        $img = ImageManagerStatic::make($this->machinery_hd_pic1)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('machinerylist')->put($name,$img);
        return $name;
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $mcdocu = MachineryList::findOrFail($id);
            $this->idKey = $mcdocu->id;
            $this->machinery_hd_date = $mcdocu->machinery_hd_date;
            $this->machinery_hd_docuno = $mcdocu->machinery_hd_docuno;
            $this->machinery_hd_status_id= $mcdocu->machinery_hd_status_id;
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

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        MachineryList::updateOrCreate([
            'id' => $this->idKey
        ],[
            'machinery_hd_date'=> $this->machinery_hd_date,
            'machinery_hd_docuno'=> $this->machinery_hd_docuno,
            'machinery_hd_status_id'=> $this->machinery_hd_status_id,
            'machinery_hd_number'=> $this->machinery_hd_number,
            'machinery_hd_type'=> $this->machinery_hd_type,
            'ms_machine_code'=> $this->ms_machine_code,
            'ms_machine_name'=> $this->ms_machine_name,
            'department_name'=> $this->department_name,
            'machinery_hd_lcaol'=> $this->machinery_hd_lcaol,
            'ms_machine_system_name'=> $this->ms_machine_system_name,
            'ms_machine_service_name'=> $this->ms_machine_service_name,
            'machinery_hd_note'=> $this->machinery_hd_note,
            'machinery_hd_save' => auth()->user()->name,
            'machinery_hd_pic1' => $this->storeImage()
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('machinerylist.list')
        ]);
    }
    public function render()
    {
        $docs_last = MachineryList::
        where('machinery_hd_docuno', 'like', '%' . date('Ymd') . '%')
        ->orderBy('id', 'desc')->first();
        if ($docs_last) {
            $docs = 'MTN-' . date('Ymd') . '-' . str_pad($docs_last->machinery_hd_number + 1, 4, '0', STR_PAD_LEFT);
            $docs_number = $docs_last->machinery_hd_number + 1;
        } else {
            $docs = 'MTN-' . date('Ymd') . '-' . str_pad(1, 4, '0', STR_PAD_LEFT);
            $docs_number = 1;
        }
        if($this->department_name){
            $d = DB::table('department_lists')->where('department_name',$this->department_name)->first();
            $g = DB::table('machine_groups')->where('gruo_code',$d->department_refcode)->first();
            $this->mcs = Machine::where('mcgroup_id',$g->id)->get();
        }
        if($this->ms_machine_code){
            $mcname = DB::table('machines')->where('mc_code',$this->ms_machine_code)->first();
            $this->ms_machine_name = $mcname->mc_name;
        }
        $this->machinery_hd_date = date('Y-m-d');
        $this->machinery_hd_docuno = $docs;
        $this->machinery_hd_number = $docs_number;
        return view('livewire.machinery-list.machinery-list-form',[
            'dep' => DepartmentList::get(),
            'sys' => MachineSystem::get(),
            'ser' => MachineService::get()
        ])->extends('layouts.main');
    }
}
