<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use App\Models\IsoIctPlanDt;
use App\Models\IsoIctPlanHd;
use App\Models\IsoIctComputerList;
use Illuminate\Support\Facades\DB;

class DocumentControlIctPlanForm extends Component
{
    public $idKey = 0;
    public $year_name;
    public $planhd_remark;
    public $planhd_type;

    public $coms = [];
    public $i = 1;

    public $checkCom = [];

    protected $listeners =[
        'selectedCom' => 'selectedCom'
    ];
    
    protected $rules =[
        'year_name' => 'required',
        'planhd_type' => 'required',
    ];

    protected $messages = [
        'year_name.required' => 'กรุณากรอกใส่ข้อมูล',
        'planhd_type.required' => 'กรุณากรอกใส่ข้อมูล'
    ];
    public function selectedCom($id)
    {
        $com = IsoIctComputerList::findOrFail($id);
        if(!empty($this->checkCom) && in_array($com->id,$this->checkCom)){
            return;
        }
        $this->coms[] = [
            'com_id' => $com->id,
            'plandt_comname' => $com->com_name,
            'plandt_comlocat' => $com->com_locat,
            'plandt_reamrk' => "",
            'plandt_check01' => 0,
            'plandt_check02' => 0,
            'plandt_check03' => 0,
            'plandt_check04' => 0,
            'plandt_check05' => 0,
            'plandt_check06' => 0,
            'plandt_check07' => 0,
            'plandt_check08' => 0,
            'plandt_check09' => 0,
            'plandt_check10' => 0,
            'plandt_check11' => 0,
            'plandt_check12' => 0,
            'plandt_action01' => 0,
            'plandt_action02' => 0,
            'plandt_action03' => 0,
            'plandt_action04' => 0,
            'plandt_action05' => 0,
            'plandt_action06' => 0,
            'plandt_action07' => 0,
            'plandt_action08' => 0,
            'plandt_action09' => 0,
            'plandt_action10' => 0,
            'plandt_action11' => 0,
            'plandt_action12' => 0,
        ];
        array_push($this->checkCom,$com->id);
    }

    public function deleteRow($index)
    {
        unset($this->coms[$index]);
    }
     
    public function save()
    {
        //dd($this->coms);
        $this->validate($this->rules,$this->messages);
        try {
            DB::beginTransaction();
            $paln = IsoIctPlanHd::updateOrCreate([
                'id' => $this->idKey
            ],[
                'year_name' => $this->year_name,
                'planhd_save' => auth()->user()->name,
                'planhd_remark' => $this->planhd_remark,
                'planhd_type' => $this->planhd_type,
                'created_at' => 1,
                'updated_at' => 1
            ]);
            if($this->idKey){
                DB::table('iso_ict_plan_dts')->where('planhd_id',$this->idKey)->delete();
            }               
            foreach($this->coms as $key => $value)
            {
                $item = IsoIctPlanDt::Create([
                    'planhd_id' => $paln->id,
                    'plandt_listno' => $key + 1,
                    'plandt_comname' => $value['plandt_comname'],
                    'plandt_comlocat' => $value['plandt_comlocat'],
                    'plandt_person' => auth()->user()->name,
                    'plandt_reamrk' => $value['plandt_reamrk'],
                    'plandt_check01' => $value['plandt_check01'],
                    'plandt_action01' => $value['plandt_action01'],
                    'plandt_check02' => $value['plandt_check02'],
                    'plandt_action02' => $value['plandt_action02'],
                    'plandt_check03' => $value['plandt_check03'],
                    'plandt_action03' => $value['plandt_action03'],
                    'plandt_check04' => $value['plandt_check04'],
                    'plandt_action04' => $value['plandt_action04'],
                    'plandt_check05' => $value['plandt_check05'],
                    'plandt_action05' => $value['plandt_action05'],
                    'plandt_check06' => $value['plandt_check06'],
                    'plandt_action06' => $value['plandt_action06'],
                    'plandt_check07' => $value['plandt_check07'],
                    'plandt_action07' => $value['plandt_action07'],
                    'plandt_check08' => $value['plandt_check08'],
                    'plandt_action08' => $value['plandt_action08'],
                    'plandt_check09' => $value['plandt_check09'],
                    'plandt_action09' => $value['plandt_action09'],
                    'plandt_check10' => $value['plandt_check10'],
                    'plandt_action10' => $value['plandt_action10'],
                    'plandt_check11' => $value['plandt_check11'],
                    'plandt_action11' => $value['plandt_action11'],
                    'plandt_check12' => $value['plandt_check12'],
                    'plandt_action12' => $value['plandt_action12'],
                    'com_id'  => $value['com_id']
                ]);
            }
            DB::commit();
            $this->dispatchBrowserEvent('swal',[
                'title' => 'บันทึกข้อมูลเรียบร้อย',
                'timer' => 3000,
                'icon' => 'success',
                'url' => route('documentcontrolictplan.list')
            ]);
            // return redirect()->route('documentcontrolictplan.list')->with('success', 'บันทึกข้อมูลเรียบร้อย');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }        
    }

    public function mount($id = 0)
    {
        if($id)
        {
            $paln = IsoIctPlanHd::findOrFail($id);
            $this->idKey = $paln->id;
            $this->year_name = $paln->year_name;
            $this->planhd_remark = $paln->planhd_remark;
            $this->planhd_type = $paln->planhd_type;   
            foreach ($paln->coms as $key => $value) {
                $this->coms[] = [
                    'com_id' => $value->com_id,
                    'plandt_comname' => $value->plandt_comname,
                    'plandt_comlocat' => $value->plandt_comlocat,
                    'plandt_reamrk' => $value->plandt_reamrk,
                    'plandt_check01' => (bool)$value->plandt_check01,
                    'plandt_check02' => (bool)$value->plandt_check02,
                    'plandt_check03' => (bool)$value->plandt_check03,
                    'plandt_check04' => (bool)$value->plandt_check04,
                    'plandt_check05' => (bool)$value->plandt_check05,
                    'plandt_check06' => (bool)$value->plandt_check06,
                    'plandt_check07' => (bool)$value->plandt_check07,
                    'plandt_check08' => (bool)$value->plandt_check08,
                    'plandt_check09' => (bool)$value->plandt_check09,
                    'plandt_check10' => (bool)$value->plandt_check10,
                    'plandt_check11' => (bool)$value->plandt_check11,
                    'plandt_check12' => (bool)$value->plandt_check12,
                    'plandt_action01' => (bool)$value->plandt_action01,
                    'plandt_action02' => (bool)$value->plandt_action02,
                    'plandt_action03' => (bool)$value->plandt_action03,
                    'plandt_action04' => (bool)$value->plandt_action04,
                    'plandt_action05' => (bool)$value->plandt_action05,
                    'plandt_action06' => (bool)$value->plandt_action06,
                    'plandt_action07' => (bool)$value->plandt_action07,
                    'plandt_action08' => (bool)$value->plandt_action08,
                    'plandt_action09' => (bool)$value->plandt_action09,
                    'plandt_action10' => (bool)$value->plandt_action10,
                    'plandt_action11' => (bool)$value->plandt_action11,
                    'plandt_action12' => (bool)$value->plandt_action12,
                ];
            }    
        }
    }

    public function render()
    {
        return view('livewire.iso-document-control-ict.document-control-ict-plan-form')->extends('layouts.main');
    }
}
