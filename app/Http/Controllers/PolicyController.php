<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\IsoPolicyLsit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class PolicyController extends Controller
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
        return view('policydocuno.document-control-policy-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pol_date' => ['required'],
            'pol_file' => ['required'],       
            'pol_status' => ['required'],
            'pol_name' => ['required'],
        ]);
        $data =[
            'pol_date' => $request->pol_date,
            'pol_status' => $request->pol_status,
            'pol_name' => $request->pol_name
        ];
        if($request->hasFile('pol_file')){
            $data['pol_file'] = $request->file('pol_file')->storeAs('assets/images/policys', "IMG_" . Carbon::now()->format('Ymdhis') . "_" . Str::random(5) . "." . $request->file('pol_file')->extension());
        }
        try {
            DB::beginTransaction();
            IsoPolicyLsit::create($data);
            DB::commit();
            return redirect()->route('documentcontrolpol.list')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('documentcontrolpol.list')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
        $pol = IsoPolicyLsit::where('id',$id)->first();
        return view('policydocuno.document-control-policy-edit', compact('pol'));
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
            'pol_date' => ['required'],
            'pol_file' => ['required'],       
            'pol_status' => ['required'],
            'pol_name' => ['required'],
        ]);
        $data =[
            'pol_date' => $request->pol_date,
            'pol_status' => $request->pol_status,
            'pol_name' => $request->pol_name
        ];
        $pol = IsoPolicyLsit::where('id',$id)->first();
        if($request->hasFile('pol_file')){
            if($pol->pol_file != null){
                File::delete($pol->pol_file);
            }
            $data['pol_file'] = $request->file('pol_file')->storeAs('assets/images/policys', "IMG_" . Carbon::now()->format('Ymdhis') . "_" . Str::random(5) . "." . $request->file('pol_file')->extension());
        }
        try {
            DB::beginTransaction();
            IsoPolicyLsit::where('id', $id)->update($data);
            DB::commit();
            return redirect()->route('documentcontrolpol.list')->with('success', 'แก้ไขข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            dd($e->getMessage()); 
            return redirect()->route('documentcontrolpol.list')->with('error', 'แก้ไขข้อมูลไม่สำเร็จ ' . Carbon::now());
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
