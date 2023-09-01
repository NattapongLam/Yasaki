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

class QrCodeScan extends Controller
{
    public function QrcodeScanChecksheetMc($id)
    {        
        $hd = DB::table('machine_checksheet_hds')->where('ms_machine_code',$id)->get();
        return view('qrcode.checksheet-mc-scan',compact('hd'));
    }
    public function QrcodeScanChecksheetPpe($id)
    {        
        $hd = DB::table('iso_ppe_department_h_d_s')
        ->where('department_name',$id)
        ->orderby('updated_at','DESC')
        ->get();
        return view('qrcode.checksheet-ppe-scan',compact('hd'));
    }
}
