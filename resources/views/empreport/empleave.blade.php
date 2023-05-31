@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">รายงานตรวจสอบการลา</h3>
            </div>
            <div class="card-body">          
                <div class="row">
                    <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">พนักงาน</th>
                                    <th class="text-center">ลาป่วย</th>
                                    <th class="text-center">ลากิจ</th>
                                    <th class="text-center">พักร้อน</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="text-align: center"><img class="img-thumbnail" alt="100x100" width="100" src="/assets/images/users/{{$item->employee_image}}"></td>
                                        <td>{{$item->employee_fullname}} ({{$item->employee_code}})</td>  
                                        <td>{{number_format($item->sickleave,0)}} (ใช้ไป: {{number_format($item->sickleave_qty,2)}} คงเหลือ: {{number_format($item->sickleave_total,2)}})</td>                                
                                        <td>{{number_format($item->businessleave,0)}} (ใช้ไป: {{number_format($item->businessleave_qty,2)}} คงเหลือ: {{number_format($item->businessleave_total,2)}})</td>
                                        <td>{{number_format($item->vacation,0)}} (ใช้ไป: {{number_format($item->vacation_qty,2)}} คงเหลือ: {{number_format($item->vacation_total,2)}})</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection