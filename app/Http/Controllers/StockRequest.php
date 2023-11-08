<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class StockRequest extends Controller
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
        $hd = DB::table('pur_stockrequest_hd')
        ->leftjoin('pur_stockrequest_status','pur_stockrequest_hd.pur_stockrequest_status_id','=','pur_stockrequest_status.pur_stockrequest_status_id')
        ->select('pur_stockrequest_hd.*','pur_stockrequest_status.pur_stockrequest_status_name')
        ->orderBy('pur_stockrequest_hd.pur_stockrequest_status_id','desc')
        ->get();
        return view('purchases.pur-stockrequest-list',compact('hd'));
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
        $hd = DB::table('pur_stockrequest_hd')->where('docuno',$id)->first();
        $dt = DB::table('pur_stockrequest_dt')->where('pur_stockrequest_hd_id',$hd->pur_stockrequest_hd_id)->get();
        $sta = DB::table('pur_stockrequest_status')
        ->whereIn('pur_stockrequest_status_id',[2,1])
        ->orderBy('pur_stockrequest_status_id','asc')
        ->get();
        return view('purchases.pur-stockrequest-edit',compact('hd','dt','sta'));
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
            'pur_stockrequest_status_id' => ['required'],
        ]);
        //dd($request->approvelnote);
        try{
            DB::beginTransaction();
            $hd = DB::table('pur_stockrequest_hd')
            ->where('pur_stockrequest_hd_id',$id)
            ->update([
                'pur_stockrequest_status_id' => $request->pur_stockrequest_status_id,
                'approvelnote' => $request->approvelnote,
                'approvelsave' => Auth::user()->name,
                'approveldate' => Carbon::now()
            ]);
            
            DB::commit();
            return redirect()->route('stockrequest.index')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        }catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('stockrequest.index')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
    public function getDataPr (Request $request){
        $sub = DB::table('pur_stockrequest_dt')->where('docuno',$request->refid)->get();
        return response()->json([
            'sub' => $sub
        ]);
    }
}
