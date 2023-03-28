<?php

namespace App\Http\Livewire\ProductList;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ProductListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $pd = DB::table('vw_product_list');
        if($this->searchTerm){
            $pd = $pd
            ->where('Code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('Name1','LIKE',"%{$this->searchTerm}%")
            ->orwhere('GroupName','LIKE',"%{$this->searchTerm}%");
        }
        $pd = $pd->paginate(21);
        return view('livewire.product-list.product-list-page',[
            'pd' => $pd
        ])->extends('layouts.main');
    }
}
