<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PackingResultDt;
use App\Models\PackingResultHd;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class PackingResultController extends Controller
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
        $pd = DB::table('vw_product_list')->get();
        return view('livewire.packing-result.packing-result-edit', compact('pd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pd = DB::table('vw_product_list')->get();
        return view('livewire.packing-result.packing-result-create', compact('pd'));
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
            'pkgresult_date' => ['required'],
        ]);
        $hd = [           
            'pkgresult_date' => $request->pkgresult_date,
            'pkgresult_empfull' => $request->pkgresult_empfull,
            'pkgresult_empqty' => $request->pkgresult_empqty,
            'pkgresult_empdel' => $request->pkgresult_empdel,
            'pkgresult_absent' => $request->pkgresult_absent,
            'pkgresult_leave' => $request->pkgresult_leave,
            'pkgresult_sick' => $request->pkgresult_sick,
            'pkgresult_vacation' => $request->pkgresult_vacation,
            'pkgresult_maternity' => $request->pkgresult_maternity,
            'pkgresult_remark' => $request->pkgresult_remark,
            'pkgresult_save' => Auth::user()->name,
            'pkgresult_status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];        
        try {
            DB::beginTransaction();
            $insertHD = PackingResultHd::create($hd);
            foreach ($request->product_id as $key => $value) 
            {
                $product = DB::table('vw_product_list')->where('id',$value)->first();
                $dt[] = [
                    'pkgresult_id' => $insertHD->id,
                    'pkgresult_listno' => $key + 1,
                    'pkgresult_pdcode' => $product->Code,
                    'pkgresult_pdname' => $product->Name1,
                    'pkgresult_pdunit' => $product->UnitName,
                    'pkgresult_pdqty' => $request->pdqty[$key],
                    'pkgresult_note' => $request->pdnote[$key],
                    'pkgresult_flag' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'pkgresult_pdtype' => $request->pdtype[$key],
                ];
            }
            $insertDT = PackingResultDt::insert($dt);
            DB::commit();
            return redirect()->route('packingresult.list')->with('success', 'เพิ่มข้อมูลสำเร็จ ' . Carbon::now());
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->route('packingresult.list')->with('error', 'เพิ่มข้อมูลไม่สำเร็จ ' . Carbon::now());
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
    public function getProduct(Request $request)
    {
        $product = DB::table('vw_product_list')
        ->where('id', $request->id)
        ->first();
        return response()->json(
            [
                'product' => $product,
            ]
        );    
    }
    public function getDetailDate(Request $request)
    {
        $hd = PackingResultHd::where('pkgresult_date',$request->id)->first();
        $dt = PackingResultDt::where('pkgresult_id',$hd->id)->get();
        return response()->json([
            'hd' => $hd,
            'dt' => $dt
        ]);
    }
}
