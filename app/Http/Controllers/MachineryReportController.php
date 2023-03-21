<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentList;
use Illuminate\Support\Facades\DB;

class MachineryReportController extends Controller
{
    public function mtnday(Request $request)
    {
        $docuno = $request->machinery_hd_docuno;
        $dep = $request->department_name;
        $dateend = $request->datened ? $request->datestart : date("Y-m-d");
        $datestart = $request->datestart ? $request->datestart : date("Y-m-d",strtotime("-1 month",strtotime($dateend)));
        $deplist = DepartmentList::get();
        $data = DB::table('machinery_lists')
        ->join('machinery_list_statuses','machinery_lists.machinery_hd_status_id','=','machinery_list_statuses.id')
        ->select('machinery_lists.*','machinery_list_statuses.name as sta_name');
        if($docuno){
            $data = $data
            ->where('machinery_hd_docuno',$docuno);
        }
        if($dep){
            $data = $data
            ->where('department_name',$dep);
        }
        if($datestart && $dateend){
            $data = $data
            ->whereBetween('machinery_hd_date',[$datestart,$dateend]);
        }
        $data = $data->get();
        return view('mtnreport.mtnday',[
            'docuno' => $docuno,
            'dep' => $dep,
            'dateend' => $dateend,
            'datestart' => $datestart,
            'deplist' => $deplist,
            'data' => $data
        ]);
    }
}
