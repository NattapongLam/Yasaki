<?php

namespace App\Http\Controllers;

use App\Models\MasterYear;
use App\Models\MasterMonth;
use App\Models\EmployeeList;
use Illuminate\Http\Request;
use App\Models\DepartmentList;
use Illuminate\Support\Carbon;
use App\Models\IsoPpeDepartmentDT;
use App\Models\IsoPpeDepartmentHD;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PpeDepartmentForm extends Controller
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
        $dep = DepartmentList::where('department_status',true)->get();
        $mont = MasterMonth::get();
        $year = MasterYear::get();
        return view('ppedepartmentform.ppe-department-create', compact('dep','mont','year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => ['required'],
            'month_name' => ['required'],
            'year_name' => ['required']
        ]);
        $hd =[
            'department_name' => $request->department_name,
            'year_name' => $request->year_name,
            'month_name' => $request->month_name,
            'job_desc' => $request->job_desc,
            'safety_01' => $request->safety_01,
            'safety_02' => $request->safety_02,
            'safety_03' => $request->safety_03,
            'safety_04' => $request->safety_04,
            'safety_05' => $request->safety_05,
            'safety_06' => $request->safety_06,
            'safety_07' => $request->safety_07,
            'safety_08' => $request->safety_08,
            'safety_09' => $request->safety_09,
            'safety_10' => $request->safety_10,
            'safety_11' => $request->safety_11,
            'safety_12' => $request->safety_12,
            'safety_13' => $request->safety_13,
            'safety_other' =>  $request->safety_other,
            'personsave' => Auth::user()->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'flag' => true
        ];
        try{

            DB::beginTransaction();
            $insertHD = IsoPpeDepartmentHD::create($hd);
            foreach ($request->emp_listno as $key => $value) {
                $dt[] = [
                    'ppe_hd_id' => $insertHD->id,
                    'emp_listno' => $value,
                    'emp_fullname' => $request->emp_fullname[$key],
                    'action1' => false,
                    'action2' => false,
                    'action3' => false,
                    'action4' => false,
                    'action5' => false,
                    'action6' => false,
                    'action7' => false,
                    'action8' => false,
                    'action9' => false,
                    'action10' => false,
                    'action11' => false,
                    'action12' => false,
                    'action13' => false,
                    'action14' => false,
                    'action15' => false,
                    'action16' => false,
                    'action17' => false,
                    'action18' => false,
                    'action19' => false,
                    'action20' => false,
                    'action21' => false,
                    'action22' => false,
                    'action23' => false,
                    'action24' => false,
                    'action25' => false,
                    'action26' => false,
                    'action27' => false,
                    'action28' => false,
                    'action29' => false,
                    'action30' => false,
                    'action31' => false,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            $insertDT = IsoPpeDepartmentDT::insert($dt);
            DB::commit();
            return redirect()->route('ppedep.list')->with('success', 'บันทึกข้อมูลเรียบร้อย');   
        }catch(\Exception $e){
            Log::error($e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
        }
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
        $hd = IsoPpeDepartmentHD::where('id',$id)->first();
        $dt = IsoPpeDepartmentDT::where('ppe_hd_id',$hd->id)->get();
        return view('ppedepartmentform.ppe-department-edit', compact('hd','dt'));
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
        $hd =[
            'job_desc' => $request->job_desc,
            'safety_01' => $request->safety_01,
            'safety_02' => $request->safety_02,
            'safety_03' => $request->safety_03,
            'safety_04' => $request->safety_04,
            'safety_05' => $request->safety_05,
            'safety_06' => $request->safety_06,
            'safety_07' => $request->safety_07,
            'safety_08' => $request->safety_08,
            'safety_09' => $request->safety_09,
            'safety_10' => $request->safety_10,
            'safety_11' => $request->safety_11,
            'safety_12' => $request->safety_12,
            'safety_13' => $request->safety_13,
            'safety_other' =>  $request->safety_other,
            'personsave' => Auth::user()->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'flag' => true
        ];
        try {
            DB::beginTransaction();
            $insertHD = IsoPpeDepartmentHD::where('id', $id)->update($hd);
            foreach ($request->dt_id as $key => $value) {
                $dt = IsoPpeDepartmentDT::where('id',$value)->update([
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
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            DB::commit();
            return redirect()->route('ppedep.list')->with('success', 'บันทึกข้อมูลเรียบร้อย');   
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
    public function getTypeDatalist(Request $request)
    {
        $dataset = EmployeeList::where('department_name',$request->ref)->where('employee_status',true)->get();
        return response()->json([
            'dataset' => $dataset,
            'ref' => 1
        ]);
    }
    public function getEmp(Request $request)
    {
        $emp = EmployeeList::where('id',$request->id)->first();
        return response()->json([
            'emp' => $emp,
        ]);
    }
}
