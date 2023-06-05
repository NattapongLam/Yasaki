<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StockSaleController extends Controller
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
        $hd1 = DB::table('SUE65_BCITEM')->orderBy('StockQty','DESC')
        ->where('Code','like','001'.'%')
        ->where('Code','not like','001-B'.'%')
        ->where('Code','not like','001-M'.'%')
        ->where('Code','not like','001-L'.'%')
        ->where('Code','not like','001-E'.'%')
        ->where('Code','not like','001-H'.'%')
        ->where('Code','not like','001-P'.'%')
        ->where('Code','not like','001-K'.'%')
        ->where('Code','not like','001-T'.'%')
        ->where('Code','not like','001-SAP'.'%')
        ->where('Code','not like','001-VK'.'%')
        ->where('Name1','not like','%'.'ส่งออก'.'%')
        ->where('Name1','not like','%'.'ไม่ใช้แล้ว'.'%')
        ->where('Name1','not like','เลิกขาย'.'%')
        ->where('Name1','<>','ใบราคาสินค้า')
        ->where('Name1','<>','เศษอลูมิเนียม ดรอส')
        ->where('Name1','<>','ผ้าเบรก')
        ->where('Name1','<>','ค่าขนส่ง')
        ->get();
        $hd2 = DB::table('SUE65_BCITEM')
        ->where('Code','like','002'.'%')
        ->where('Code','not like','002-L'.'%')
        ->where('Code','not like','002-E'.'%')
        ->where('Code','not like','002-M'.'%')
        ->where('Code','not like','002-RU'.'%')
        ->where('Code','not like','002-S'.'%')
        ->where('Code','not like','002-T'.'%')
        ->where('Code','not like','002-VN'.'%')
        ->where('Code','not like','002-กต'.'%')
        ->get();
        $hd3 = DB::table('SUE65_BCITEM')
        ->where('Code','like','003'.'%')
        ->where('Code','not like','003-H'.'%')
        ->where('Code','not like','003-M'.'%')
        ->where('Name1','like','มือคลัทช์'.'%')
        ->get();
        $hd4 = DB::table('SUE65_BCITEM')
        ->where('Name1','like','มือเบรค'.'%')
        ->get();
        $hd5 = DB::table('SUE65_BCITEM')
        ->where('Code','like','005'.'%')
        ->get();
        $hd6 = DB::table('SUE65_BCITEM')
        ->where('Code','like','006'.'%')
        ->get();
        $hd7 = DB::table('SUE65_BCITEM')
        ->where('Code','like','007'.'%')
        ->where('Code','not like','007-H'.'%')
        ->where('Code','not like','007-M'.'%')
        ->where('Code','not like','007-R'.'%')
        ->where('Code','not like','007-S'.'%')
        ->get();
        $hd8 = DB::table('SUE65_BCITEM')
        ->where('Code','like','008'.'%')
        ->where('Code','not like','008-H'.'%')
        ->where('Code','not like','008-M'.'%')
        ->get();
        $hd9 = DB::table('SUE65_BCITEM')
        ->where('Code','like','009'.'%')
        ->where('Code','not like','009-H'.'%')
        ->where('Code','not like','009-M'.'%')
        ->where('Code','not like','009-L'.'%')
        ->where('Code','not like','009-N'.'%')
        ->where('Code','not like','009-R'.'%')
        ->where('Code','not like','009-S'.'%')
        ->where('Code','not like','009-V'.'%')
        ->get();
        $hd10 = DB::table('SUE65_BCITEM')
        ->where('Code','like','010'.'%')
        ->get();
        $hd11 = DB::table('SUE65_BCITEM')
        ->where('Code','like','011'.'%')
        ->where('Code','not like','011-H'.'%')
        ->get();
        $hd13 = DB::table('SUE65_BCITEM')
        ->where('Code','like','013'.'%')
        ->where('Code','not like','013-H'.'%')
        ->where('Code','not like','013-M'.'%')
        ->where('Code','not like','013-R'.'%')
        ->where('Code','not like','013-V'.'%')
        ->get();
        $hd14 = DB::table('SUE65_BCITEM')
        ->where('Code','like','014'.'%')
        ->where('Code','not like','014-H'.'%')
        ->where('Code','not like','014-R'.'%')
        ->where('Code','not like','014-S'.'%')
        ->where('Code','not like','014-V'.'%')
        ->get();
        $hd15 = DB::table('SUE65_BCITEM')
        ->where('Code','like','015'.'%')
        ->where('Code','not like','015-M'.'%')
        ->get();
        return view('saleorder.stock-sale',compact('hd1','hd2','hd3','hd4','hd5','hd6','hd7','hd8','hd9','hd10','hd11','hd13','hd14','hd15'));
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
