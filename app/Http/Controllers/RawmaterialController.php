<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RawmaterialController extends Controller
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
        $rm = DB::table('vw_rawmaterial_list')->where('id',$id)->first();
        $fg = DB::table('vw_product_bom')
        ->leftjoin('vw_product_list','vw_product_bom.bom_hd_fgcode','=','vw_product_list.Code')
        ->select('vw_product_list.*')
        ->where('vw_product_bom.bom_rm_pdcode',$rm->Code)
        ->get();
        $price = DB::table('vw_vendor_pricelist')->where('ItemCode',$rm->Code)->get();
        $pr = DB::table('vw_pr_requestt')
        ->where('ItemCode',$rm->Code)
        ->where('Total','>',0)
        ->get();
        return view('rawmaterialreport.rawmaterial-list-report', compact('fg','price','rm','pr'));
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
