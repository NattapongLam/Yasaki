<?php

namespace App\Http\Livewire\ProductList;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductListBom extends Component
{
    public $idKey=0;
    public $code;
    public $dt = [];
   

    protected $listeners = [
        'editListBom' => 'edit'
    ];
    public function edit($id)
    {
        $pd = DB::table('vw_product_list')->where('id',$id)->first();
        $this->idKey = $pd->id;
        $this->code = $pd->Code;
        //$this->dt = DB::table('vw_product_bom')->where('bom_hd_fgcode',$this->code)->get();
    }

    public function render()
    {
        if($this->code){
            $this->dt = DB::table('vw_product_bom')->where('bom_hd_fgcode',$this->code)->get();
        }
        return view('livewire.product-list.product-list-bom',[
            'dt' => $this->dt
        ]);
    }
}
