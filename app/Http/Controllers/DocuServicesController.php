<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\EmployeeList;
use Illuminate\Http\Request;
use App\Models\DepartmentList;
use App\Models\IsoIctDocuService;
use App\Models\IsoIctComputerList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DocuServicesController extends Controller
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
        $com = IsoIctComputerList::where('com_type','คอมพิวเตอร์')->get();
        $emp = EmployeeList::where('employee_status',true)->get();
        $dep = DepartmentList::get();
        return view('docuit-services.form-create-docuit-services', compact('com','emp','dep'));
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
            'serv_type' => ['required'],
            'serv_user' => ['required'],
            'serv_dep' => ['required'],
            'serv_com' => ['required'],
            'serv_case' => ['required'],
            'serv_remark' => ['required'],
            'personsave' => ['required']
        ]);
        $hd =[          
            'serv_type' => $request->serv_type,
            'serv_user' => $request->serv_user,
            'serv_dep' => $request->serv_dep,
            'serv_com' => $request->serv_com,
            'serv_case' => $request->serv_case,
            'serv_remark' => $request->serv_remark,
            'personsave' => $request->personsave,           
            'created_at' => Carbon::now(),
            'status' => true
        ];
        try{

            DB::beginTransaction();
            $insertHD = IsoIctDocuService::create($hd);
            DB::commit();
            return redirect()->route('fmict03.list')->with('success', 'บันทึกข้อมูลเรียบร้อย');   
        }catch(\Exception $e){
            Log::error($e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
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
        $com = IsoIctComputerList::where('com_type','คอมพิวเตอร์')->get();
        $emp = EmployeeList::where('employee_status',true)->get();
        $dep = DepartmentList::get();
        $hd = IsoIctDocuService::where('id',$id)->first();
        return view('docuit-services.form-edit-docuit-services', compact('com','emp','dep','hd'));
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
            $insertHD = IsoIctDocuService::where('id',$id)->update([
                'serv_note' => $request->serv_note,
                'personcheck' => $request->personcheck,
                'personict' => $request->personict,
                'closeit_date' => $request->closeit_date,
                'closeit_save' => $request->closeit_save,
                'close_save' => $request->close_save,
                'close_note' => $request->close_note
            ]);
            DB::commit();
            return redirect()->route('fmict03.list')->with('success', 'บันทึกข้อมูลเรียบร้อย');   
        }catch(\Exception $e){
            Log::error($e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาด');
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
