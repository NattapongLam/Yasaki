<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\assessempdt;
use App\Models\assessemphd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AssessEmployee extends Controller
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
        $hd = DB::table('vw_assess_employeelist')
        ->get();
        return view('assessemployeelist.assess-employee-list', compact('hd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        if($request->assessemp_id == null){
            $hd = [
                'assess_hd_id' => $request->assess_hd_id,
                'employee_code' => $request->employee_code,
                'employee_fullname' => $request->employee_fullname,
                'department_name' => $request->department_name,
                'employee_job' => $request->employee_job,
                'assessemp_hd_year' => '2566',
                'assessemp_hd_time' => '01/01 - 31/12',
                'assessemp_hd_save' => Auth::user()->name,
                'assessemp_hd_remark' => $request->assessemp_hd_remark,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            try{
                DB::beginTransaction();
                $insertHD = assessemphd::create($hd);
                foreach ($request->dt_id as $key => $value) {
                    $list = DB::table('assess_dt')->where('id',$value)->first();
                    $dt[] = [
                        'assessemp_hd_id' => $insertHD->id,
                        'assess_dt_id' => $value,
                        'assess_dt_listno' => $list->assess_dt_listno,
                        'assess_dt_name' => $list->assess_dt_name,
                        'assess_dt_qty' => $list->assess_dt_qty,
                        'assessemp_qty_01' => $request->assessemp_qty_01[$key],
                        'assessemp_qty_02' => $request->assessemp_qty_02[$key],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
                $insertDT = assessempdt::insert($dt);
                DB::commit();
                return redirect()->route('ass-emp.index')->with('success', 'บันทึกข้อมูลเรียบร้อย');   
            }catch(\Exception $e){
                Log::error($e->getMessage());
                dd($e->getMessage());
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
            }          
        }else {
            $hd = [
                'assessemp_hd_save' => Auth::user()->name,
                'assessemp_hd_remark' => $request->assessemp_hd_remark,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            try{
                DB::beginTransaction();
                assessemphd::where('id',$request->assessemp_id)->update($hd);
                foreach ($request->dt_id as $key => $value) {
                    $list = DB::table('assessemp_dt')
                    ->where('id',$value)
                    ->update([
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                        'assessemp_qty_01' => $request->assessemp_qty_01[$key],
                        'assessemp_qty_02' => $request->assessemp_qty_02[$key],
                    ]);
                }
                DB::commit();
                return redirect()->route('ass-emp.index')->with('success', 'บันทึกข้อมูลเรียบร้อย');   
            }catch(\Exception $e){
                Log::error($e->getMessage());
                dd($e->getMessage());
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
            }     
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
        $hd = DB::table('vw_assess_employeelist')
        ->where('id',$id)
        ->first();
        if($hd->assessemp_id == null){
            $dt = DB::table('assess_dt')
            ->where('assess_hd_id',$hd->assess_hd_id)
            ->where('flag',true)
            ->get();
        }
        else {
            $dt = DB::table('assessemp_dt')
            ->where('assessemp_hd_id',$hd->assessemp_id)
            ->get();
        }
        return view('assessemployeelist.assess-employee-edit', compact('hd','dt'));
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
        //
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
