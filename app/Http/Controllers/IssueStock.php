<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class IssueStock extends Controller
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
        $hd = DB::table('str_issuestock_hd')
        ->leftjoin('str_issuestock_status','str_issuestock_hd.str_issuestock_status_id','=','str_issuestock_status.str_issuestock_status_id')
        ->whereYear('str_issuestock_hd.str_issuestock_hd_date',now()->year)
        ->where('str_issuestock_hd.str_issuestock_status_id',4)
        ->orderBy('str_issuestock_hd.str_issuestock_hd_date','desc')
        ->get();
        return view('warehouses.fm-issuestock-list',compact('hd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hd = DB::table('str_issuestock_hd')
        ->leftjoin('str_issuestock_status','str_issuestock_hd.str_issuestock_status_id','=','str_issuestock_status.str_issuestock_status_id')
        ->whereYear('str_issuestock_hd.str_issuestock_hd_date',now()->year)
        ->where('str_issuestock_hd.str_issuestock_status_id',1)
        ->orderBy('str_issuestock_hd.str_issuestock_hd_date','desc')
        ->get();
        return view('warehouses.fm-issuestock-appr',compact('hd'));
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
        $hd = DB::table('str_issuestock_hd')->where('str_issuestock_hd_docuno',$id)->first();
        $dt = DB::table('str_issuestock_dt')->where('str_issuestock_hd_id',$hd->str_issuestock_hd_id)->get();
        $sta = DB::table('str_issuestock_status')->whereIN('str_issuestock_status_id',[1,2])->get();
        return view('warehouses.fm-issuestock-edit',compact('hd','dt','sta'));
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
        $hd = DB::table('str_issuestock_hd')->where('str_issuestock_hd_id',$id)->first();      
        try{
            DB::beginTransaction();
            if($hd->str_issuestock_status_id == 1)
            {
                $up = DB::table('str_issuestock_hd')
                ->where('str_issuestock_hd_id',$id)
                ->update([
                    'checkedsave' => Auth::user()->name,
                    'checkeddate' => Carbon::now()
                ]);
            }
            elseif($hd->str_issuestock_status_id == 4)
            {
                $up = DB::table('str_issuestock_hd')
                ->where('str_issuestock_hd_id',$id)
                ->update([
                    'approvelsave' => Auth::user()->name,
                    'approveldate' => Carbon::now(),
                    'approvelnote' => $request->approvelnote,
                    'str_issuestock_status_id' => $request->str_issuestock_status_id
                ]);
            }
            DB::commit();
            return redirect()->route('issuestock.index')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        }catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('issuestock.index')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
    public function list(Request $request)
    {
        $hd = DB::table('str_issuestock_hd')
        ->leftjoin('str_issuestock_status','str_issuestock_hd.str_issuestock_status_id','=','str_issuestock_status.str_issuestock_status_id')
        ->whereYear('str_issuestock_hd.str_issuestock_hd_date',now()->year)
        ->whereIn('str_issuestock_hd.str_issuestock_status_id',[3,5])
        ->orderBy('str_issuestock_hd.str_issuestock_hd_date','desc')
        ->get();
        return view('warehouses.fm-issuestock-clos',compact('hd'));
    }
}
