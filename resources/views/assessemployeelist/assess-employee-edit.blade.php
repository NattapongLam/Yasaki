@extends('layouts.main')
@section('content')
<link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    <h3 class="card-title">แบบประเมินประจำปี</h3>
                </div>
                <form method="POST" class="form-horizontal" action="{{ route('ass-emp.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-2 text-center">
                            <img class="img-thumbnail" alt="120x120" width="120" src="/assets/images/users/{{$hd->employee_image}}">
                            <input type="hidden" value="{{$hd->assessemp_id}}" name="assessemp_id">
                            <input type="hidden" value="{{$hd->assess_hd_id}}" name="assess_hd_id">
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="employee_code" class="col-form-label">รหัสพนักงาน :</label>
                            <input class="form-control" value="{{$hd->employee_code}}" name="employee_code" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="employee_fullname" class="col-form-label">ชื่อ - นามสกุล :</label>
                            <input class="form-control" value="{{$hd->employee_fullname}}" name="employee_fullname" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="department_name" class="col-form-label">แผนก :</label>
                            <input class="form-control" value="{{$hd->department_name}}" name="department_name" readonly>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="employee_job" class="col-form-label">ตำแหน่ง :</label>
                            <input class="form-control" value="{{$hd->employee_job}}" name="employee_job" readonly>
                        </div>   
                        <div class="col-12 col-md-2">
                            <label for="assessemp_hd_year" class="col-form-label">ประจำปี :</label>
                            <input class="form-control" value="2566 (01/01 - 31/12)" name="assessemp_hd_year" readonly>
                        </div>                     
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label for="assessemp_hd_remark" class="col-form-label">หมายเหตุ :</label>
                            <textarea class="form-control" name="assessemp_hd_remark">{{$hd->assessemp_hd_remark}}</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive-xxl">
                                <div style="overflow-x:auto;">
                                    <table id="tb_ass" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ลำดับ</th>
                                                <th class="text-center">รายละเอียด</th>
                                                <th class="text-center">คะแนนเต็ม</th>
                                                <th class="text-center">01-06</th>
                                                <th class="text-center">07-12</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dt as $item)
                                              <tr>
                                                <td class="text-center">
                                                    {{$item->assess_dt_listno}}
                                                    <input type="hidden" value="{{$item->id}}" name="dt_id[]">
                                                </td>
                                                <td>{{$item->assess_dt_name}}</td>
                                                <td class="text-center">{{number_format($item->assess_dt_qty,2)}}</td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{old('assessemp_qty_01',0)}}" name="assessemp_qty_01[]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{old('assessemp_qty_02',0)}}" name="assessemp_qty_02[]">
                                                </td>
                                              </tr>  
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                    </div>                  
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection   
@push('scriptjs')
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script>
$(document).ready(function() {
    $('#tb_ass').DataTable({                   
        "autoWidth": false,
        "pageLength": 50,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],       
        dom: 'Bfrtip',
        width: '200%',
        height: 'auto',
        colHeaders: true,
        rowHeaders: true,
        colWidths: [30, 
        500, 100, 100, 100],
        manualColumnResize: true,
        licenseKey: 'non-commercial-and-evaluation',
        buttons: [
            'copy','excel',
        ],  
        "order": [ 1, "asc" ],
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 3,
        }
    })
});
</script>
@endpush