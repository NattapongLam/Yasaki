@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">มาตรฐานน้ำหนักสินค้าลงกล่อง YSK1-SD-PKG-20 R.00-20231020</h3>
            </div>
            <div class="card-body">
                <table id="tb_job_p" class="table table-bordered">
                    <thead>
                        <th>
                            <tr>
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า (BC)</th>
                                <th>ชื่อสินค้า/ประเภทบรรจุ</th>
                                <th>จำนวนบรรจุ (คู่/กล่อง)</th>
                                <th>น้ำหนักรวม (Kg./กล่อง)</th>
                                <th>ช่วงการยอมรับ (Kg)</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="2">สูตรการคิดต่อ 1 (น้ำหนักเฉลี่ย / จำนวนบรรจุ)</th>
                                <th>อ้างอิงจากน้ำหนักเฉลี่ยชั่งจริง</th>
                                <th>น้ำเฉลี่ยน + - น้ำหนักต่อ1</th>
                            </tr>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($hd as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->productcode}}</td>
                                <td>{{$item->Name1}}</td>
                                <td>{{number_format($item->packqty,2)}}</td>
                                <td>{{number_format($item->kgqty,2)}}</td>
                                <td>{{number_format($item->kgmin,2)}} - {{number_format($item->kgmax,2)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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