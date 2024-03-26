<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataCarReport extends Controller
{
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
        $hd = DB::table('car_report')->where('car_report_docuno',$id)->first();
        return view('car-report.car-report-vendor', compact('hd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'car_report_cause' => ['required'],
            'car_report_correct' => ['required'],
            'car_report_prevent' => ['required'],
            'persondate' => ['required'],
            'person_web' => ['required']           
        ]);
        $hd =[
            'car_report_cause' => $request->car_report_cause,
            'car_report_correct' => $request->car_report_correct,
            'car_report_prevent' => $request->car_report_prevent,
            'persondate' => $request->persondate,
            'person_web' => $request->person_web,
            'ref_status_id' => 2
        ];
        try {
            DB::beginTransaction();
            $insertHD = DB::table('car_report')->where('id', $id)->update($hd);
            DB::commit();
            return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อย');   
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
