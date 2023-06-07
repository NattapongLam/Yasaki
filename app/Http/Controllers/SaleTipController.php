<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\SalePlantip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SaleTipController extends Controller
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
        $cust = Customer::get();
        $tip = SalePlantip::leftjoin('customers','sale_plantips.cust_id','=','customers.id')
        ->where('sale_plantips.tip_flag',true)
        ->whereMonth('sale_plantips.tip_date',Carbon::now()->month)   
        ->whereYear('sale_plantips.tip_date',Carbon::now()->year)   
        ->get();
        return view('saleorder.sale-tip-plan',compact('cust','tip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            SalePlantip::create([
                'tip_date' => $request->tip_date,
                'cust_id' => $request->cust_id,
                'tip_remark' => $request->tip_remark,
                'tip_type' => $request->tip_type,
                'tip_plan' => true,
                'tip_action' => false,
                'tip_save' => Auth::user()->name,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'tip_flag' => true,
            ]);
            DB::commit();
            return redirect()->route('sale-tip.create')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('sale-tip.create')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
        $tip = SalePlantip::leftjoin('customers','sale_plantips.cust_id','=','customers.id')
        ->where('sale_plantips.id',$id)
        ->first();
        return view('saleorder.sale-tip-action',compact('tip'));
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
            SalePlantip::where('id',$id)->update([
                'tip_action' => true,
                'tip_remark' => $request->tip_remark,
                'tip_type' => $request->tip_type,
                'updated_at' =>  Carbon::now()
            ]);
            DB::commit();
            return redirect()->route('sale-tip.create')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('sale-tip.create')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
    public function confirmDelTip(Request $request)
    {
        $id = $request->refid;
        $update_hd = SalePlantip::where('id',$id)
        ->update([
            'tip_flag' => false
        ]);       
        return response()->json([
            'status' => true,
            'message' => 'ยกเลิกเอกสารเรียบร้อยแล้ว'
        ]);        
    }

}
