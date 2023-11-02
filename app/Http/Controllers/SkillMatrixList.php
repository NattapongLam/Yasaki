<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SkillMatrixList extends Controller
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
        $hd = DB::table('skill_hd')
        ->leftjoin('department_lists','skill_hd.department_id','=','department_lists.id')
        ->where('skill_hd.flag',true)
        ->get();
        return view('skilllist.fm-skillmatrix-dep',compact('hd'));
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
        $hd = DB::table('employee_lists')->where('department_id',$id)->where('employee_status',true)->get();
        $dep = DB::table('department_lists')->where('id',$id)->first();       
        return view('skilllist.fm-skillmatrix-emp',compact('hd','dep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hd = DB::table('employee_lists')->where('employee_code',$id)->first();
        $emp = DB::table('skill_emp')->where('employee_code',$id)->get();
        $tra = DB::table('trainingemp')->where('trainingemp_empcode',$id)->get();
        return view('skilllist.fm-skillmatrix-list',compact('emp','hd','tra'));
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
