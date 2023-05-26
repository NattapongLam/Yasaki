<?php
namespace App\Imports;

use Carbon\Carbon;
use App\Models\LeaveType;
use App\Models\LeaveConfig;
use App\Models\EmployeeList;
use App\Models\LeaveDocList;
use App\Models\LeaveApprovalDt;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeaveDoc implements ToCollection, WithHeadingRow
{
    public function collection(Collection $row)
    {       
       DB::beginTransaction();
       try {
        foreach ($row as $key => $value) {
            //dd($row);
            $lcon = LeaveConfig::where('leav_name',$value['leav_name'])->first();
            $ltyp = LeaveType::where('ltype_qty',$value['ltype_qty'])->first();
            $emp = EmployeeList::where('employee_code',$value['employee_code'])->first();
            $app = LeaveApprovalDt::where('leavapp_id',$emp->approval_id)->first();
            $doc = LeaveDocList::create([
                'ldoc_datestart' => $value['ldoc_datestart'],
                'ldoc_dateend' => $$value['ldoc_dateend'],
                'lconf_id' =>  $lcon->id,
                'ltype_id' => $ltyp->id,
                'employee_code' => $value['employee_code'],
                'employee_fullname' => $emp->employee_fullname,
                'approval_id' => $emp->approval_id,
                'ldoc_reamrk' => $value['ldoc_reamrk'],
                'lsta_id' => 3,
                'ldoc_save' => auth()->user()->name,
                'ldoc_appsave' => $app->leavsub_empname,
                'ldoc_appdesc' => "Import File"
            ]);
        }           
        DB::commit();
       } catch (\Exception $e) {
        DB::rollBack();
        return $e;
       }
    }
}