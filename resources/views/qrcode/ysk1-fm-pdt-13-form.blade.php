@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="col-form-label" style="color: red">ผู้ตรวจเช็คแก๊ส :</label>
                        <input type="text" name="person_at" id="person_at" value="{{$hd->person_at}} : {{\Carbon\Carbon::parse($hd->iso_pdt_fm13_hd_date)->format('d/m/Y')}}"
                        class="form-control" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="col-form-label" style="color: red">ผู้จัดการ/รับทราบ :</label>
                        <input type="text" name="person_at" id="person_at" value="{{$hd->approved_save}} : {{\Carbon\Carbon::parse($hd->approved_date)->format('d/m/Y')}}"
                        class="form-control" readonly>
                    </div>
                    <div class="col-12 col-md-4">
                        <label class="col-form-label" style="color: red">เดือน - ปี :</label>
                        <input type="text" name="person_at" id="person_at" value="{{$hd->iso_pdt_fm13_hd_month}} / {{$hd->iso_pdt_fm13_hd_year}}"
                        class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label class="col-form-label" style="color: red">หมายเหตุอื่นๆจากผู้จัดการ :</label>
                        <input type="text" name="person_at" id="person_at" value="{{$hd->approved_note}}"
                        class="form-control" readonly>
                    </div>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รายการเช็ค</th>
                                <th>ผลการตรวจ</th>
                                <th>หมายเหตุ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dt as $item)
                                <tr>
                                    <td>{{$item->iso_pdt_fm13_dt_listno}}</td>
                                    <td>{{$item->iso_pdt_fm13_dt_name}}</td>
                                    <td>{{$item->iso_pdt_fm13_dt_status}}</td>
                                    <td>{{$item->iso_pdt_fm13_dt_note}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>
     $(document).ready(function() {
            $('#tb_job_p').DataTable({             
                "autoWidth": false,
                "pageLength": 30,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 1, "asc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
</script>
@endpush