<?php

namespace App\Http\Livewire\IsoDocumentControl;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\DepartmentList;
use App\Models\IsoIctMonthkpi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class DocumentControlKpiForm extends Component
{
    use WithFileUploads;
    
    public $idKey = 0;
    public $kpi_date;
    public $dep_name;
    public $kpi_name;
    public $kpi_file;
    public $kpi_status=1;

    protected $listeners = [
        'editIsokpi' => 'edit',
        'btnCreateIsokpi' => 'resetInput'
    ];

    protected $rules = [
        'kpi_date' => 'required',
        'dep_name' => 'required',
        'kpi_name' => 'required',
        //'kpi_file' => 'required',
    ];

    protected $messages = [
        'kpi_date.required' => 'กรุณากรอกใส่ข้อมูล',
        'dep_name.required' => 'กรุณากรอกใส่ข้อมูล',
        'kpi_name.required' => 'กรุณากรอกใส่ข้อมูล',
        //'kpi_file.required' => 'กรุณากรอกใส่ข้อมูล'
    ];

    public function edit($id)
    {
        $kpi = IsoIctMonthkpi::findOrFail($id);
        $this->idKey = $kpi->id;
        $this->kpi_date = $kpi->kpi_date;
        $this->dep_name = $kpi->dep_name;
        $this->kpi_name = $kpi->kpi_name;
        //$this->kpi_file = $kpi->kpi_file;
        $this->kpi_status = $kpi->kpi_status;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('kpi_date');
        $this->reset('dep_name');
        $this->reset('kpi_name');
        $this->reset('kpi_file');
        $this->reset('kpi_status');
    }

    public function storeImage()
    {
        if(!$this->kpi_file){
            return null;
        }
        $img = ImageManagerStatic::make($this->kpi_file)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('kpifile')->put($name,$img);
        return $name;
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);
        $kpi = new IsoIctMonthkpi();
        if($this->idKey > 0)
        {
            $kpi = IsoIctMonthkpi::findOrfail($this->idKey);  
            $kpi->kpi_file = $this->kpi_file ? $this->storeImage() : $kpi->kpi_file;
        }
        else
        {
            $kpi->kpi_file = $this->storeImage();
        }
        $kpi->kpi_date = $this->kpi_date;
        $kpi->dep_name = $this->dep_name;
        $kpi->kpi_name = $this->kpi_name;
        $kpi->kpi_status = $this->kpi_status;
        $kpi->save();
        $this->resetInput();
        $this->emit("refreshIsokpi");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control.document-control-kpi-form',[
            'dep' =>  DepartmentList::get()
        ]);
    }
}
