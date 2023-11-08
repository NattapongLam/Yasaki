@extends('layouts.main')
@section('content')
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">รายการใบเบิกสินค้า</h4>
                <div class="table-responsive">
                    <table id="tb_job" class="table mb-0 border-collapse">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>เลขที่เอกสาร</th>
                                <th>แผนก</th>
                                <th>สถานะ</th>
                                <th>ผู้อนุมัติ</th>
                                <th>ผู้จ่ายสินค้า</th>
                                <th>ผู้รับสินค้า</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hd as $item)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($item->str_issuestock_hd_date)->format('d/m/Y')}}</td>
                                <td>{{$item->str_issuestock_hd_docuno}}</td>
                                <td>{{$item->str_issuestock_hd_depcode}}</td>
                                <td>
                                    @if ($item->str_issuestock_status_id == 1)
                                    <span class="badge bg-success">{{$item->str_issuestock_status_name}}</span>
                                    @elseif ($item->str_issuestock_status_id == 2)
                                    <span class="badge bg-danger">{{$item->str_issuestock_status_name}}</span>
                                    @elseif ($item->str_issuestock_status_id == 3)
                                    <span class="badge bg-primary">{{$item->str_issuestock_status_name}}</span>
                                    @elseif ($item->str_issuestock_status_id == 4)
                                    <span class="badge bg-warning">{{$item->str_issuestock_status_name}}</span>
                                    @elseif ($item->str_issuestock_status_id == 5)
                                    <span class="badge bg-secondary">{{$item->str_issuestock_status_name}}</span>
                                    @endif
                                </td>
                                <td>{{$item->approvelsave}}</td>
                                <td>{{$item->checkedsave}}</td>
                                <td>{{$item->str_issuestock_hd_receive}}</td>
                                <td>
                                    @if ($item->str_issuestock_status_id == 1)
                                    <a href="{{route('issuestock.edit',$item->str_issuestock_hd_docuno)}}" 
                                        class="btn btn-soft-info waves-effect waves-light" 
                                        target=”_blank”><i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                </td>
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
@endpush               