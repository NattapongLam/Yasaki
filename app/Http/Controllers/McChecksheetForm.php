<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\EmployeeList;
use Illuminate\Http\Request;
use App\Models\DepartmentList;
use Illuminate\Support\Facades\DB;
use App\Models\MachineChecksheetDt;
use App\Models\MachineChecksheetHd;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class McChecksheetForm extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hd = MachineChecksheetHd::where('id',$id)->first();
        $dt = MachineChecksheetDt::where('checksheetmc_hd_docuno',$hd->checksheetmc_hd_docuno)->get();
        $chkemp = DB::table('machine_checksheet_lgs')->where('checksheetmc_hd_docuno',$hd->checksheetmc_hd_docuno)->get();
        $dep = DepartmentList::where('department_refcode',$hd->ms_machine_group_code)->first();  
        if(Auth::user()->username == "A570126"){
            $emp = EmployeeList::whereIn('department_name',['ทำสี(PTG)','แพ็คกิ้ง(PKG)'])->get();
        }else{
            $emp = EmployeeList::where('department_name',$dep->department_name)->get();
        }
        return view('mcchecksheet.mc-checksheet-edit', compact('hd','dt','chkemp','emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
        DB::beginTransaction();
            foreach ($request->dt_id as $key => $value) {
                $dt = MachineChecksheetDt::where('id',$value)->update([
                    'action1' => $request->action1[$key],
                    'action2' => $request->action2[$key],
                    'action3' => $request->action3[$key],
                    'action4' => $request->action4[$key],
                    'action5' => $request->action5[$key],
                    'action6' => $request->action6[$key],
                    'action7' => $request->action7[$key],
                    'action8' => $request->action8[$key],
                    'action9' => $request->action9[$key],
                    'action10' => $request->action10[$key],
                    'action11' => $request->action11[$key],
                    'action12' => $request->action12[$key],
                    'action13' => $request->action13[$key],
                    'action14' => $request->action14[$key],
                    'action15' => $request->action15[$key],
                    'action16' => $request->action16[$key],
                    'action17' => $request->action17[$key],
                    'action18' => $request->action18[$key],
                    'action19' => $request->action19[$key],
                    'action20' => $request->action20[$key],
                    'action21' => $request->action21[$key],
                    'action22' => $request->action22[$key],
                    'action23' => $request->action23[$key],
                    'action24' => $request->action24[$key],
                    'action25' => $request->action25[$key],
                    'action26' => $request->action26[$key],
                    'action27' => $request->action27[$key],
                    'action28' => $request->action28[$key],
                    'action29' => $request->action29[$key],
                    'action30' => $request->action30[$key],
                    'action31' => $request->action31[$key],
                    'updated_at' => Carbon::now(),
                ]);
            }
            foreach ($request->emp_id as $key => $value) {
                $chkemp = DB::table('machine_checksheet_lgs')->where('id',$value)->update([
                    'checksheetmc_note_empname' => $request->checksheetmc_note_empname[$key],
                    'checksheetmc_note_remark' => $request->checksheetmc_note_remark[$key],
                    'updated_at' => Carbon::now(),
                ]);
            }
            DB::commit();
            return redirect()->route('mc_check.edit',$request->hd_id)->with('success', 'บันทึกข้อมูลเรียบร้อย'); 
        }catch(\Exception $e){
        Log::error($e->getMessage());
        dd($e->getMessage());
        return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
