<?php

namespace App\Http\Livewire\PackingResult;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PackingResultHd;

class PackingResult extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $searchTerm;
    
    public function render()
    {
        $hd = PackingResultHd::query();
        if($this->searchTerm){
            $hd = $hd
            ->where('pkgresult_date','LIKE',"%{$this->searchTerm}%")
            ->orwhere('pkgresult_remark','LIKE',"%{$this->searchTerm}%");
        }
        $hd = $hd->paginate(10);
        return view('livewire.packing-result.packing-result',[
            'hd' => $hd
        ])->extends('layouts.main');
    }
}
