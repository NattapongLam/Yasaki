<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use App\Models\IsoIctChecksheet;
use App\Models\IsoIctComputerList;

class IsoFmIct06List extends Component
{
    public $idKey = 0;
    public $com_name;
    public $dt = [];

    protected $listeners = [
        'editDocumentControlIct' => 'edit',
    ];
    public function edit($id)
    {
        $comlist = IsoIctComputerList::findOrFail($id);
        $this->idKey = $comlist->id;
        $this->com_name =  $comlist->com_name;
        $this->dt = IsoIctChecksheet::where('com_id',$this->idKey)->get();
    }
    public function render()
    {
        return view('livewire.iso-document-control-ict.iso-fm-ict06-list',[
            'dt' =>  $this->dt
        ]);
    }
}
