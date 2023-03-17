<?php

namespace App\Http\Livewire\Employee;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\EmployeeList;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class EmployeeFormPage extends Component
{
    use WithFileUploads;
    
    public $idKey = 0;
    public $name;
    public $email;
    public $password;
    public $username;
    public $avatar;
    public $type="Employee";
    public $employee_id;
    public $useper =[];

    public function rulesValidate()
    {
        if($this->idKey)
        {
            return[
                'employee_id'=> "required",
                'username'=> "required|unique:users,username,".$this->idKey,
                'type'=> "required",
            ];
        }
        else
        {
            return[
                'employee_id'=> "required",
                // 'email'=> "required|unique:users,email",
                'password'=> "required|min:8",
                'username'=> "required|unique:users,username",
                'type'=> "required",
            ];
        }
    }

    protected $messages =[
        'employee_id.required' => 'กรุณาระบุชื่อพนักงาน',
        // 'email.required' => 'กรุณาระบุอีเมล์',
        // 'email.unique' => 'อีเมล์นี้มีอยู่ในระบบแล้ว',
        'username.required' => 'กรุณาระบุชื่อผู้ใช้',
        'username.unique' => 'ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว',
        'password.required' => 'กรุณาระบุรหัสผ่าน',
        'password.min' => 'กรุณาระบุรหัสผ่าน 8 ตัวขึ้นไป',
        'type.required' => 'กรุณาระบุประเภท'
    ];

    public function save()
    {
        $this->validate($this->rulesValidate(),$this->messages);
        $employee = new User();
        if($this->idKey > 0){
            $employee = User::findOrfail($this->idKey);     
            $employee->password = $this->password ? Hash::make($this->password) : $employee->password;   
            $employee->avatar = $this->avatar ? $this->storeImage() : $employee->avatar;
        }else{           
            $employee->password= Hash::make($this->password);
            $employee->avatar= $this->storeImage();
        }
        $employee->employee_id = $this->employee_id;
        $employee->name = $this->name;
        $employee->email= $this->email;          
        $employee->username= $this->username;       
        $employee->type= $this->type;
        $employee->save();
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('employee.list')
        ]);
    }

    public function storeImage()
    {
        if(!$this->avatar){
            return null;
        }
        $img = ImageManagerStatic::make($this->avatar)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('employee')->put($name,$img);
        return $name;
    }
    
    public function mount($id = 0)
    {
        if($id > 0)
        {
            $employee = User::findOrfail($id);
            $this->idKey = $employee->id;
            $this->employee_id = $employee->employee_id;
            $this->name = $employee->name;
            $this->email = $employee->email;
            $this->username= $employee->username;
            $this->type= $employee->type;
           
        }
    }

    public function render()
    {
        if($this->employee_id){
            $emp = EmployeeList::findOrFail($this->employee_id);
            $this->username = $emp->employee_code;
            $this->name = $emp->employee_fullname;
            $use = DB::table('users')->where('employee_id',$this->employee_id)->first();
            if($use){
                $this->useper = DB::table('model_has_permissions')
                ->join('permissions','permissions.id','=','model_has_permissions.permission_id')
                ->join('menus','permissions.name','=','menus.permission_name')
                ->where('model_id',$use->id)
                ->get();
            }            
        }
        return view('livewire.employee.employee-form-page',[
            'emplist' => EmployeeList::where('employee_status',true)->get()
        ])->extends('layouts.main');
    }
}
