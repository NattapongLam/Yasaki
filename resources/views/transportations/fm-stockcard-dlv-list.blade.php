@extends('layouts.main')
@section('content')
<link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
<div class="row">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{ session('success') }}
        <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ session('error') }}
        <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">สต็อคสินค้า {{$hd->dlv_stock_code}} จำนวน : {{number_format($hd->dlv_stock_qty,2)}} อัพเดทวันที่ : {{$hd->dlv_stock_date}}</h3>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>จำนวนรับเข้า</th>
                                    <th>จำนวนจ่ายออก</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dt as $item)
                                    <tr>
                                        <td>{{$item->date}}</td>
                                        <td>{{number_format($item->instc,2)}}</td>
                                        <td>{{number_format($item->outstc,2)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">ยอดคงเหลือ</th>
                                    <td>{{number_format($total,2)}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>
</script>
@endpush