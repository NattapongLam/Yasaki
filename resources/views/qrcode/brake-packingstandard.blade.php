@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">ค่ามาตรฐานการบรรจุภัณฑ์ (ผ้าเบรค)</h3>
            </div>
            <div class="card-body">
                <table id="tb_job" class="table table-bordered">
                    <thead>
                        <th>
                            <tr>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>รหัสวัตถุดิบ</th>
                                <th>ชื่อวัตถุดิบ</th>
                            </tr>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($hd as $item)
                            <tr>
                                <td>{{$item->bomhd_fgcode}}</td>
                                <td>{{$item->bomhd_fgname}}</td>
                                <td>{{$item->bompack_packcode}}</td>
                                <td>{{$item->bompack_packname}}</td>
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

</script>
@endpush