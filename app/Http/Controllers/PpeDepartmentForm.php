<?php

namespace App\Http\Controllers;

use App\Models\MasterYear;
use App\Models\MasterMonth;
use App\Models\EmployeeList;
use Illuminate\Http\Request;
use App\Models\DepartmentList;

class PpeDepartmentForm extends Controller
{
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
        $dep = DepartmentList::where('department_status',true)->get();
        $mont = MasterMonth::get();
        $year = MasterYear::get();
        return view('ppedepartmentform.ppe-department-create', compact('dep','mont','year'));
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
    public function getTypeDatalist(Request $request)
    {
        $dataset = EmployeeList::where('department_name',$request->ref)->where('employee_status',true)->get();
        return response()->json([
            'dataset' => $dataset,
            'ref' => 1
        ]);
    }
    public function getEmp(Request $request)
    {
        $emp = EmployeeList::where('id',$request->id)->first();
        return response()->json([
            'emp' => $emp,
        ]);
    }
}
