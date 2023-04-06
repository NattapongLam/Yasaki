<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\IsoPolicyLsit;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class DocumentControlPolicyForm extends Component
{
    use WithFileUploads;
    
    public $idKey = 0;
    public $pol_date;
    public $pol_name;
    public $pol_file;
    public $pol_status=1;

    protected $listeners = [
        'editIsopol' => 'edit',
        'btnCreateIsopol' => 'resetInput'
    ];

    protected $messages = [
        'pol_date.required' => 'กรุณากรอกใส่ข้อมูล',
        'pol_name.required' => 'กรุณากรอกใส่ข้อมูล',
    ];

    protected $rules = [
        'pol_date' => 'required',
        'pol_name' => 'required',
    ];

    public function edit($id)
    {
        $pol = IsoPolicyLsit::findOrFail($id);
        $this->idKey = $pol->id;
        $this->pol_date = $pol->pol_date;
        $this->pol_name = $pol->pol_name;
        $this->pol_status = $pol->pol_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('pol_date');
        $this->reset('pol_name');
        $this->reset('pol_file');
        $this->reset('pol_status');
    }

    
    public function storeImage()
    {
        if(!$this->pol_file){
            return null;
        }
        $img = ImageManagerStatic::make($this->pol_file)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('polfile')->put($name,$img);
        return $name;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $pol = new IsoPolicyLsit();
        if($this->idKey > 0)
        {
            $pol = IsoPolicyLsit::findOrfail($this->idKey);  
            $pol->pol_file = $this->pol_file ? $this->storeImage() : $pol->pol_file;
        }
        else
        {
            $pol->pol_file = $this->storeImage();
        }
        $pol->pol_date = $this->pol_date;
        $pol->pol_name = $this->pol_name;
        $pol->pol_status = $this->pol_status;
        $pol->save();
        $this->resetInput();
        $this->emit("refreshIsopol");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control.document-control-policy-form');
    }
}
