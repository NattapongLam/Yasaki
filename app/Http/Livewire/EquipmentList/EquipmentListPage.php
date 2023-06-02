<?php

namespace App\Http\Livewire\EquipmentList;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EquipmentListPage extends Component
{
    use WithPagination;

    
    protected $paginationTheme = "bootstrap";

    public $searchTerm;

    public function render()
    {
        $pd = DB::table('vw_equipment_list');
        if($this->searchTerm){
            $pd = $pd
            ->where('Code','LIKE',"%{$this->searchTerm}%")
            ->orwhere('Name1','LIKE',"%{$this->searchTerm}%")
            ->orwhere('GroupName','LIKE',"%{$this->searchTerm}%");
        }
        $pd = $pd->paginate(21);
        return view('livewire.equipment-list.equipment-list-page',[
            'pd' => $pd
        ])->extends('layouts.main');
    }
}
