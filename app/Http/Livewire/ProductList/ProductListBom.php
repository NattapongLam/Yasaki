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
        $pds = DB::table('vw_product_list')->where('id',$id)->first();
        $this->idKey = $pds->id;
        $this->code = $pds->Code;
        $this->dt = DB::table('vw_product_bom')->where('bom_hd_fgcode',$this->code)->get();
    }

    public function render()
    {
        return view('livewire.product-list.product-list-bom');
    }
}
