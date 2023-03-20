<?php

namespace App\Http\Livewire\MachineryList;

use Livewire\Component;
use App\Models\MachineryList;
use App\Models\MachineryListSub;
use App\Models\MachineryListStatus;

class MachineryListEnd extends Component
{
    public $idKey = 0;
    public $machinery_hd_date;
    public $machinery_hd_docuno;
    public $machinery_hd_type;
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
    public $machinery_hd_status_id;
    public $machinery_hd_personsave;
    public $vendor_code;
    public $vendor_name;
    public $machinery_hd_refdocuno;
    public $machinery_hd_pic1;
    public $machinery_hd_pic2;
    public $machinery_hd_status_name;


    public $listdt =[];
 
    


    public function mount($id = 0)
    {         
        $listhd = MachineryList::findOrFail($id);        
        $liststa = MachineryListStatus::where('id',$listhd->machinery_hd_status_id)->first();
        $this->idKey = $listhd->id;
        $this->machinery_hd_docuno = $listhd->machinery_hd_docuno;
        $this->machinery_hd_date = $listhd->machinery_hd_date;
        $this->machinery_hd_type =  $listhd->machinery_hd_type;
        $this->machinery_hd_status_name = $liststa->name;
        $this->department_name = $listhd->department_name;
        $this->ms_machine_code = $listhd->ms_machine_code;
        $this->ms_machine_name = $listhd->ms_machine_name;  
        $this->ms_machine_system_name = $listhd->ms_machine_system_name;
        $this->ms_machine_service_name = $listhd->ms_machine_service_name;
        $this->machinery_hd_lcaol = $listhd->machinery_hd_lcaol;
        $this->machinery_hd_checkdate =  $listhd->machinery_hd_checkdate;
        $this->machinery_hd_personsave = $listhd->machinery_hd_personsave;
        $this->machinery_hd_refdocuno = $listhd->machinery_hd_refdocuno;
    }



    public function render()
    {
        if($this->idKey){
            $this->listdt = MachineryListSub::where('mclist_id',$this->idKey)->get();
        }
        return view('livewire.machinery-list.machinery-list-end')->extends('layouts.main');
    }
}
