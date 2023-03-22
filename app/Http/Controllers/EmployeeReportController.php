<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeReportController extends Controller
{
    public function emptime(Request $request)
    {
        $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();
        $dateend = $request->dateend ? $request->dateend : date("Y-m-d");
        $datestart = $request->datestart ? $request->datestart : date("Y-m-d",strtotime("-1 month",strtotime($dateend)));
        if($emp->department_name == "สำนักงาน(OFF)"){
            $data = DB::table('employee_datetimes')
            ->join('employee_lists','employee_datetimes.emp_times_empcode','=','employee_lists.employee_code')
            ->where('emp_times_empcode',auth()->user()->username);
        }
        else{
            $data = DB::table('employee_datetimes')
            ->join('employee_lists','employee_datetimes.emp_times_empcode','=','employee_lists.employee_code')
            ->where('emp_times_depcode',$emp->department_code);
        }
        if($datestart && $dateend){
            $data = $data
            ->whereBetween('emp_times_date',[$datestart,$dateend]);
        }
        $data = $data->get();
        return view('empreport.emptime',[
            'dateend' => $dateend,
            'datestart' => $datestart,
            'data' => $data
        ]);
    }
}
