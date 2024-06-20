<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class QrCodeScan extends Controller
{
    public function QrcodeScanChecksheetMc($id)
    {        
        $hd = DB::table('machine_checksheet_hds')
        ->where('ms_machine_code',$id)
        ->orderBy('checksheetmc_hd_date','DESC')
        ->get();
        return view('qrcode.checksheet-mc-scan',compact('hd'));
    }
    public function QrcodeScanChecksheetPpe($id)
    {        
        $hd = DB::table('iso_ppe_department_h_d_s')
        ->where('department_name',$id)
        ->where('flag',1)
        ->orderby('updated_at','DESC')
        ->get();
        return view('qrcode.checksheet-ppe-scan',compact('hd'));
    }
    public function QrcodeScanPackingStandardBrake()
    {
        $hd = DB::table('iso_packingstandard')
        ->leftjoin('SUE65_BCITEM','SUE65_BCITEM.Code','=','iso_packingstandard.bomhd_fgcode')
        ->where('bomtype_name','ผ้าเบรค')
        ->get();
        return view('qrcode.brake-packingstandard',compact('hd'));
    }  
    public function QrcodeScanPackingStandardDisk()
    {
        $hd = DB::table('iso_packingstandard')
        ->leftjoin('SUE65_BCITEM','SUE65_BCITEM.Code','=','iso_packingstandard.bomhd_fgcode')
        ->where('bomtype_name','ดิสเบรด')
        ->get();
        return view('qrcode.disk-packingstandard',compact('hd'));
    }
    public function QrcodeScanPackingStandardHub()
    {
        $hd = DB::table('iso_packingstandard')
        ->leftjoin('SUE65_BCITEM','SUE65_BCITEM.Code','=','iso_packingstandard.bomhd_fgcode')
        ->where('bomtype_name','<>','ผ้าเบรค')
        ->where('bomtype_name','<>','ดิสเบรด')
        ->get();
        return view('qrcode.hub-packingstandard',compact('hd'));
    }
    public function QrcodeScanQualityProcedure($id){
        $hd = DB::table('iso_holder_lists')
        ->leftjoin('iso_master_lists','iso_holder_lists.iso_doculist_code','=','iso_master_lists.iso_doculist_code')
        ->where('iso_holder_lists.iso_doculist_code',$id)
        ->first();
        $file = 'images/isodocuments/'.$hd->iso_doculist_filename;
        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
        return response()->file(public_path($file),['content-type'=>'application/pdf']);
    }
    public function QrcodeScanQualityPolicy($id){
        $hd = DB::table('iso_policy_lsits')
        ->where('pol_name',$id)
        ->first();
        $file = 'images/isopolicy/'.$hd->pol_filename;
        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
        return response()->file(public_path($file),['content-type'=>'application/pdf']);
    }

    public function QrcodeScanQualityMasterList($id){
        $hd = DB::table('iso_master_lists')
        ->where('iso_doculist_code',$id)
        ->first();
        $file = 'images/isodocuments/'.$hd->iso_doculist_filename;
        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
        return response()->file(public_path($file),['content-type'=>'application/pdf']);
    }
    public function QrcodeScanPackingPkg14()
    {
        $hd = DB::table('vw_ysk1_sd_pkg_14')->get();
        return view('qrcode.ysk1-sd-pkg-14',compact('hd'));
    }
    public function QrcodeScanProductSue($id)
    {
        $hd = DB::table('SUE65_BCITEM')->where('Code',$id)->first();
        return view('qrcode.productfg-sue',compact('hd'));
    }
    public function QrcodeYSK1FMPDT13()
    {
        $hd = DB::table('iso_pdt_fm13_hd')->where('iso_pdt_fm13_hd_flag',true)->get();
        return view('qrcode.ysk1-fm-pdt-13',compact('hd'));
    }
    public function QrcodeYSK1FMPDT12(){
        $file = 'images/isodocuments/1.2 YSK1-FM-QMR-12 บันทึกการประชุมทบทวนฝ่ายบริหาร_67.pdf';
        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);
        return response()->file(public_path($file),['content-type'=>'application/pdf']);
    }
}
