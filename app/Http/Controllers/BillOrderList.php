<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BillOrderList extends Controller
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
        $hd = DB::table('SUE65_BCARINVOICE')
        ->where('CheckTran',null)
        ->where('DocDate','>=','2023-12-01')
        ->get();
        return view('billorderlist.fm-billorder-create',compact('hd'));
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
        $hd = DB::table('SUE65_BCARINVOICE')->where('DocNo',$id)->first();
        $dt = DB::table('SUE65_BCARINVOICESUB')->where('DocNo',$id)->get();
        return view('billorderlist.fm-billorder-edit',compact('hd','dt'));
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
        $hd = DB::table('SUE65_BCARINVOICE')
        ->where('DocNo',$id)
        ->update([
            'CheckTran' => 'Y'
        ]);
        foreach ($request->dt_id as $key => $value) {
            $dt = DB::table('SUE65_BCARINVOICESUB')
            ->where('ROWORDER',$value)
            ->update([
                'CheckQty' => $request->dt_qty[$key]
            ]);
            $pd = DB::table('SUE65_BCARINVOICESUB')
            ->where('ROWORDER',$value)
            ->first();
            $stc = DB::table('dlv_stocksub')
            ->insert([
                'dlv_stocksub_code' => $pd->ItemCode,
                'dlv_stocksub_flag' => -1,
                'dlv_stocksub_qty' => $request->dt_qty[$key],
                'dlv_stocksub_save' => Auth::user()->name,
                'dlv_stocksub_date' => Carbon::now()
            ]);
        }
        DB::commit();
        return redirect()->route('billorder.index')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        }catch (Exception $e) {
        DB::rollBack();
        Log::error($e->getMessage());
        return redirect()->route('billorder.index')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
