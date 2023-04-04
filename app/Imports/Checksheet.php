<?php
namespace App\Imports;

use App\Models\IsoIctChecksheet;
use App\Models\IsoIctComputerList;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Checksheet implements ToCollection, WithHeadingRow
{
    public function collection(Collection $row)
    {
       //dd($row);
       DB::beginTransaction();
       try {
        foreach ($row as $key => $value) {
            $com = IsoIctComputerList::where('com_name',$value['com_name'])->first();
            $doc = IsoIctChecksheet::create([
                'cit_date' =>  $value['cit_date'],
                'com_id' =>  $com->id,
                'com_name' => $value['com_name'],
                'cit_check1' => $value['cit_check1'],
                'cit_check2' => $value['cit_check2'],
                'cit_check3' => $value['cit_check3'],
                'cit_check4' => $value['cit_check4'],
                'cit_check5' => $value['cit_check5'],
                'cit_remark' => $value['cit_remark'],
                'cit_save' => $value['cit_save']
            ]);
        }           
        DB::commit();
       } catch (\Exception $e) {
        DB::rollBack();
        return $e;
       }
    }
}