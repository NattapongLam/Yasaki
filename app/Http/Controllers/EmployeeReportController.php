<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function emptime(Request $request)
    {
        $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();
        $dateend = $request->dateend ? $request->dateend : date("Y-m-d");
        $datestart = $request->datestart ? $request->datestart : date("Y-m-d",strtotime("-1 month",strtotime($dateend)));
        if($emp->department_name == "สำนักงาน(OFF)" || $emp->department_name == "ขาย(SAL)"){
            $data = DB::table('employee_datetimes')
            ->join('employee_lists','employee_datetimes.emp_times_empcode','=','employee_lists.employee_code')
            ->where('emp_times_empcode',auth()->user()->username);
        }
        elseif(auth()->user()->username == "B521001"){
            $data = DB::table('employee_datetimes')
            ->join('employee_lists','employee_datetimes.emp_times_empcode','=','employee_lists.employee_code')
            ->where('emp_times_empcode',"B521001");
        }elseif(auth()->user()->username == "A570126"){
            $data = DB::table('employee_datetimes')
            ->join('employee_lists','employee_datetimes.emp_times_empcode','=','employee_lists.employee_code')
            ->whereIn('emp_times_depcode',['A15','A16']);
        }else{
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
    public function empleave(Request $request)
    {
        $emp = DB::table('employee_lists')->where('employee_code',auth()->user()->username)->first();
        if($emp->department_name == "สำนักงาน(OFF)" || $emp->department_name == "ขาย(SAL)"){
            $data = DB::table('vw_emp_leaverepostnew')->where('employee_code',auth()->user()->username);
        }
        elseif(auth()->user()->username == "B521001"){
            $data = DB::table('vw_emp_leaverepostnew')->where('employee_code',"B521001");
        }elseif(auth()->user()->username == "A570126"){
            $data = DB::table('vw_emp_leaverepostnew')->whereIn('department_name',['ทำสี(PTG)','แพ็คกิ้ง(PKG)']);
        }else{
            $data = DB::table('vw_emp_leaverepostnew')->where('department_name',$emp->department_name);
        }
        $data = $data->get();

        return view('empreport.empleave',[
            'data' => $data
        ]);
    }
}
