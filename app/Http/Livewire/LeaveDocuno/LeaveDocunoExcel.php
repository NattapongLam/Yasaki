<?php

namespace App\Http\Livewire\LeaveDocuno;

use Excel;
use Livewire\Component;
use App\Imports\LeaveDoc;
use Livewire\WithFileUploads;

class LeaveDocunoExcel extends Component
{
    use WithFileUploads;

    public $excel;

    public function importExcel()
    {
        Excel::import(new LeaveDoc,$this->excel->path());
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('leavedocuno.list')
        ]);
    }
    
    public function render()
    {
        return view('livewire.leave-docuno.leave-docuno-excel')->extends('layouts.main');
    }
}
