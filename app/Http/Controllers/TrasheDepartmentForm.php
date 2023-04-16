<?php

namespace App\Http\Controllers;

use App\Models\MasterYear;
use App\Models\MasterMonth;
use App\Models\MasterTrash;
use Illuminate\Http\Request;
use App\Models\DepartmentList;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\IsoTrasheDepartment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TrasheDepartmentForm extends Controller
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
        $tras = MasterTrash::get();
        return view('trashedepartmentform.trashe-department-create', compact('dep','mont','year','tras'));
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
        try{

            DB::beginTransaction();
            foreach ($request->tras_id as $key => $value) 
            {
                $tra = MasterTrash::where('id',$value)->first();
                $dt[] = [
                    'department_name' => $request->department_name,
                    'year_name' => $request->year_name,
                    'month_name' => $request->month_name,
                    'tras_id' => $value,
                    'tras_listno' => $tra->tras_listno,
                    'tras_name' => $tra->tras_name,
                    'tras_unit' => $tra->tras_unit,
                    'personsave' => Auth::user()->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'flag' => true,
                    'qty01' => $request->qty01[$key],
                    'qty02' => $request->qty02[$key],
                    'qty03' => $request->qty03[$key],
                    'qty04' => $request->qty04[$key],
                    'qty05' => $request->qty05[$key],
                    'qty06' => $request->qty06[$key],
                    'qty07' => $request->qty07[$key],
                    'qty08' => $request->qty08[$key],
                    'qty09' => $request->qty09[$key],
                    'qty10' => $request->qty10[$key],
                    'qty11' => $request->qty11[$key],
                    'qty12' => $request->qty12[$key],
                    'qty13' => $request->qty13[$key],
                    'qty14' => $request->qty14[$key],
                    'qty15' => $request->qty15[$key],
                    'qty16' => $request->qty16[$key],
                    'qty17' => $request->qty17[$key],
                    'qty18' => $request->qty18[$key],
                    'qty19' => $request->qty19[$key],
                    'qty20' => $request->qty20[$key],
                    'qty21' => $request->qty21[$key],
                    'qty22' => $request->qty22[$key],
                    'qty23' => $request->qty23[$key],
                    'qty24' => $request->qty24[$key],
                    'qty25' => $request->qty25[$key],
                    'qty26' => $request->qty26[$key],
                    'qty27' => $request->qty27[$key],
                    'qty28' => $request->qty28[$key],
                    'qty29' => $request->qty29[$key],
                    'qty30' => $request->qty30[$key],
                    'qty31' => $request->qty31[$key],
                ];
            }
            $insertDT = IsoTrasheDepartment::insert($dt);
            DB::commit();
            return redirect()->route('trashedep.list')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        }catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('trashedep.list')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
        $tras = DB::table('vw_trashe_departments')->where('id',$id)->first();
        $dt = IsoTrasheDepartment::where('department_name',$tras->department_name)
        ->where('year_name',$tras->year_name)
        ->where('month_name',$tras->month_name)
        ->get();
        return view('trashedepartmentform.trashe-department-edit', compact('tras','dt'));
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
        try{
            DB::beginTransaction();
            foreach ($request->dt_id as $key => $value) {
                $dt = IsoTrasheDepartment::where('id',$value)->update([
                    'personsave' => Auth::user()->name,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'flag' => true,
                    'qty01' => $request->qty01[$key],
                    'qty02' => $request->qty02[$key],
                    'qty03' => $request->qty03[$key],
                    'qty04' => $request->qty04[$key],
                    'qty05' => $request->qty05[$key],
                    'qty06' => $request->qty06[$key],
                    'qty07' => $request->qty07[$key],
                    'qty08' => $request->qty08[$key],
                    'qty09' => $request->qty09[$key],
                    'qty10' => $request->qty10[$key],
                    'qty11' => $request->qty11[$key],
                    'qty12' => $request->qty12[$key],
                    'qty13' => $request->qty13[$key],
                    'qty14' => $request->qty14[$key],
                    'qty15' => $request->qty15[$key],
                    'qty16' => $request->qty16[$key],
                    'qty17' => $request->qty17[$key],
                    'qty18' => $request->qty18[$key],
                    'qty19' => $request->qty19[$key],
                    'qty20' => $request->qty20[$key],
                    'qty21' => $request->qty21[$key],
                    'qty22' => $request->qty22[$key],
                    'qty23' => $request->qty23[$key],
                    'qty24' => $request->qty24[$key],
                    'qty25' => $request->qty25[$key],
                    'qty26' => $request->qty26[$key],
                    'qty27' => $request->qty27[$key],
                    'qty28' => $request->qty28[$key],
                    'qty29' => $request->qty29[$key],
                    'qty30' => $request->qty30[$key],
                    'qty31' => $request->qty31[$key],
                ]);
            }        
            DB::commit();
            return redirect()->route('trashedep.list')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        }catch(\Exception $e){
            Log::error($e->getMessage());
            dd($e->getMessage());
            return redirect()->route('trashedep.list')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
