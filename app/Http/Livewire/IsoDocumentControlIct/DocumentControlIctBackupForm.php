<?php

namespace App\Http\Livewire\IsoDocumentControlIct;

use Livewire\Component;
use App\Models\IsoIctServerBackup;

class DocumentControlIctBackupForm extends Component
{
    public $idKey = 0;
    public $year_name;
    public $month_id;
    public $ck_day01;
    public $ck_day02;
    public $ck_day03;
    public $ck_day04;
    public $ck_day05;
    public $ck_day06;
    public $ck_day07;
    public $ck_day08;
    public $ck_day09;
    public $ck_day10;
    public $ck_day11;
    public $ck_day12;
    public $ck_day13;
    public $ck_day14;
    public $ck_day15;
    public $ck_day16;
    public $ck_day17;
    public $ck_day18;
    public $ck_day19;
    public $ck_day20;
    public $ck_day21;
    public $ck_day22;
    public $ck_day23;
    public $ck_day24;
    public $ck_day25;
    public $ck_day26;
    public $ck_day27;
    public $ck_day28;
    public $ck_day29;
    public $ck_day30;
    public $ck_day31;

    protected $listeners = [
        'editDocumentControlIctBackup' => 'edit',
        'btnCreateDocumentControlIctBackup' => 'resetInput'
    ];

    public function edit($id)
    {
        $ictbackup = IsoIctServerBackup::findOrFail($id);
        $this->idKey = $ictbackup->id;
        $this->year_name = $ictbackup->year_name;
        $this->month_id = $ictbackup->month_id;
        $this->ck_day01 = $ictbackup->ck_day01;
        $this->ck_day02 = $ictbackup->ck_day02;
        $this->ck_day03 = $ictbackup->ck_day03;
        $this->ck_day04 = $ictbackup->ck_day04;
        $this->ck_day05 = $ictbackup->ck_day05;
        $this->ck_day06 = $ictbackup->ck_day06;
        $this->ck_day07 = $ictbackup->ck_day07;
        $this->ck_day08 = $ictbackup->ck_day08;
        $this->ck_day09 = $ictbackup->ck_day09;
        $this->ck_day10 = $ictbackup->ck_day10;
        $this->ck_day11 = $ictbackup->ck_day11;
        $this->ck_day12 = $ictbackup->ck_day12;
        $this->ck_day13 = $ictbackup->ck_day13;
        $this->ck_day14 = $ictbackup->ck_day14;
        $this->ck_day15 = $ictbackup->ck_day15;
        $this->ck_day16 = $ictbackup->ck_day16;
        $this->ck_day17 = $ictbackup->ck_day17;
        $this->ck_day18 = $ictbackup->ck_day18;
        $this->ck_day19 = $ictbackup->ck_day19;
        $this->ck_day20 = $ictbackup->ck_day20;
        $this->ck_day21 = $ictbackup->ck_day21;
        $this->ck_day22 = $ictbackup->ck_day22;
        $this->ck_day23 = $ictbackup->ck_day23;
        $this->ck_day24 = $ictbackup->ck_day24;
        $this->ck_day25 = $ictbackup->ck_day25;
        $this->ck_day26 = $ictbackup->ck_day26;
        $this->ck_day27 = $ictbackup->ck_day27;
        $this->ck_day28 = $ictbackup->ck_day28;
        $this->ck_day29 = $ictbackup->ck_day29;
        $this->ck_day30 = $ictbackup->ck_day30;
        $this->ck_day31 = $ictbackup->ck_day31;
    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('year_name');
        $this->reset('month_id');
        $this->reset('ck_day01');
        $this->reset('ck_day02');
        $this->reset('ck_day03');
        $this->reset('ck_day04');
        $this->reset('ck_day05');
        $this->reset('ck_day06');
        $this->reset('ck_day07');
        $this->reset('ck_day08');
        $this->reset('ck_day09');
        $this->reset('ck_day10');
        $this->reset('ck_day11');
        $this->reset('ck_day12');
        $this->reset('ck_day13');
        $this->reset('ck_day14');
        $this->reset('ck_day15');
        $this->reset('ck_day16');
        $this->reset('ck_day17');
        $this->reset('ck_day18');
        $this->reset('ck_day19');
        $this->reset('ck_day20');
        $this->reset('ck_day21');
        $this->reset('ck_day22');
        $this->reset('ck_day23');
        $this->reset('ck_day24');
        $this->reset('ck_day25');
        $this->reset('ck_day26');
        $this->reset('ck_day27');
        $this->reset('ck_day28');
        $this->reset('ck_day29');
        $this->reset('ck_day30');
        $this->reset('ck_day31');
    }

    public function save()
    {
        IsoIctServerBackup::updateOrCreate([
            'id' => $this->idKey
        ],[
            'year_name' => $this->year_name,
            'month_id' => $this->month_id,
            'ck_day01' => $this->ck_day01,
            'ck_day02' => $this->ck_day02,
            'ck_day03' => $this->ck_day03,
            'ck_day04' => $this->ck_day04,
            'ck_day05' => $this->ck_day05,
            'ck_day06' => $this->ck_day06,
            'ck_day07' => $this->ck_day07,
            'ck_day08' => $this->ck_day08,
            'ck_day09' => $this->ck_day09,
            'ck_day10' => $this->ck_day10,
            'ck_day11' => $this->ck_day11,
            'ck_day12' => $this->ck_day12,
            'ck_day13' => $this->ck_day13,
            'ck_day14' => $this->ck_day14,
            'ck_day15' => $this->ck_day15,
            'ck_day16' => $this->ck_day16,
            'ck_day17' => $this->ck_day17,
            'ck_day18' => $this->ck_day18,
            'ck_day19' => $this->ck_day19,
            'ck_day20' => $this->ck_day20,
            'ck_day20' => $this->ck_day21,
            'ck_day22' => $this->ck_day22,
            'ck_day23' => $this->ck_day23,
            'ck_day24' => $this->ck_day24,
            'ck_day25' => $this->ck_day25,
            'ck_day26' => $this->ck_day26,
            'ck_day27' => $this->ck_day27,
            'ck_day28' => $this->ck_day28,
            'ck_day29' => $this->ck_day29,
            'ck_day30' => $this->ck_day30,
            'ck_day31' => $this->ck_day31,
            'backup_save' => auth()->user()->name
        ]);
        $this->resetInput();
        $this->emit("refreshDocumentControlIctBackup");
        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('modalHide');
    }

    public function render()
    {
        return view('livewire.iso-document-control-ict.document-control-ict-backup-form');
    }
}
