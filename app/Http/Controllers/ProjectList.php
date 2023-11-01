<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProjectList extends Controller
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
        $hd1 = DB::table('project_hd')
        ->where('project_status_id',1)
        ->get();
        $hd2 = DB::table('project_hd')
        ->where('project_status_id',4)
        ->get();
        $hd3 = DB::table('project_hd')
        ->where('project_status_id',3)
        ->get();
        return view('projectlist.fm-projectlist',compact('hd1','hd2','hd3'));
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
        $hd = DB::table('project_hd')->where('project_hd_id',$id)->first();
        $sta = DB::table('project_status')->where('project_status_id',$hd->project_status_id)->first();
        $dt = DB::table('project_dt')->where('project_hd_id',$id)->get();
        return view('projectlist.fm-projectview',compact('hd','sta','dt'));
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
