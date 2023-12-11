<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PackingWeightController extends Controller
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
    public function index(Request $request)
    {
        $dateend = $request->dateend ? $request->dateend : date("Y-m-d");
        $datestart = $request->datestart ? $request->datestart : date("Y-m-d",strtotime("-1 month",strtotime($dateend)));
        $hd = DB::table('iso_pkg_fm05_hd')
        ->where('flag',true)
        ->whereBetween('date',[$datestart,$dateend])
        ->get();
        return view('iso_pkg.ysk1-fm-pkg-05-list',compact('hd','datestart','dateend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hd = DB::table('SUE65_BCITEM')
        ->where('Code','like','0'.'%')
        ->where('Name1','not like','%'.'ไม่ใช้แล้ว'.'%')
        ->where('Name1','not like','เลิกขาย'.'%')
        ->where('Name1','<>','ใบราคาสินค้า')
        ->where('Name1','<>','เศษอลูมิเนียม ดรอส')      
        ->where('Name1','<>','ผ้าเบรก')
        ->where('Name1','<>','ค่าขนส่ง')
        ->where('Name1','not like','%'.'****')
        ->get();
        return view('iso_pkg.ysk1-fm-pkg-05-create',compact('hd'));
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
            'productcode' => ['required'],
            'date' => ['required']
        ]);
        $pd = DB::table('SUE65_BCITEM')->where('Code',$request->productcode)->first();
        try{
            DB::beginTransaction();
            
            DB::commit();
            return redirect()->route('iso-pkg-05.edit')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        }catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('iso-pkg-05.edit')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
        $hd = DB::table('iso_pkg_fm05_hd')->where('id',$id)->first();
        $dt = DB::table('iso_pkg_fm05_dt')
        ->where('pkgfm05_id',$id)
        ->where('pkgfm05_flag',true)
        ->get();
        return view('iso_pkg.ysk1-fm-pkg-05-edit',compact('hd','dt'));
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
