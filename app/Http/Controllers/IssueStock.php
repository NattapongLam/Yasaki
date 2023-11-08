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
        return view('warehouses.fm-issuestock-edit',compact('hd','dt'));
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
