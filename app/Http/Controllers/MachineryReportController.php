<?php

namespace App\Http\Controllers;

use Excel;
use App\Exports\mtnday;
use Illuminate\Http\Request;
use App\Models\DepartmentList;
use App\Models\MachineryListSub;
use Illuminate\Support\Facades\DB;

class MachineryReportController extends Controller
{
    public function mtnday(Request $request)
    {
        $docuno = $request->docuno;
        $dep = $request->dep;
        $dateend = $request->dateend ? $request->dateend : date("Y-m-d");
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
    public function getDataMcListsub (Request $request){
        $sub = DB::table('machinery_list_subs')->where('mclist_id',$request->refid)->get();
        return response()->json([
            'sub' => $sub
        ]);
    }
    public function mtnmonth(Request $request)
    {
        $year = $request->year ? $request->year : date("Y");
        $dep = $request->dep;
        $deplist = DepartmentList::get();
        $data = $data = DB::table('vw_machinery_monthreport');
        if($year){   
            $data = $data      
            ->where('Year', $year);
        }
        if($dep){
            $data = $data
            ->where('department_name',$dep);
        }
        $data = $data->orderby('Month','asc')->get();
        return view('mtnreport.mtnmonth',[
            'year' =>  $year,
            'deplist' => $deplist,
            'dep' => $dep,
            'data' => $data,
            'months' => '',
            'dataBar' => ''
        ]);
    }
}
