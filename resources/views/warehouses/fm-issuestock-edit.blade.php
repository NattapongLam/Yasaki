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
        <form method="POST" class="form-horizontal" action="{{ route('issuestock.update',$hd->str_issuestock_hd_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if ($hd->str_issuestock_status_id == 4)
        @if(auth()->user()->username == "A653615" || auth()->user()->username == "A551528" || auth()->user()->username == "A439396")  
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="str_issuestock_status_id" class="col-form-label">สถานะ</label>
                            <select class="form-control" name="str_issuestock_status_id" id="str_issuestock_status_id">
                                @foreach ($sta as $item)
                                <option value="{{$item->str_issuestock_status_id}}">{{$item->str_issuestock_status_name}}</option>
                                @endforeach
                            </select>                           
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="form-group">
                        <label for="approvelnote" class="col-form-label">หมายเหตุ</label>
                        <input type="text" class="form-control" name="approvelnote" id="approvelnote">
                        </div>
                    </div>
                </div><hr>
                <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">อนุมัติ</button> 
            </div>
        </div>
        @endif 
        @elseif($hd->str_issuestock_status_id == 1)
        @if (auth()->user()->username == "A653615" || auth()->user()->username == "A490807")
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">จ่ายสินค้า</button> 
            </div>
        </div>
        @endif       
        @endif
        </form>
        <div class="card">
            <div class="card-body">
                <h5>รายละเอียด</h5>      
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="str_issuestock_hd_date" class="col-form-label">วันที่</label>
                            <input type="date" class="form-control" name="str_issuestock_hd_date" id="str_issuestock_hd_date" value="{{$hd->str_issuestock_hd_date}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="str_issuestock_hd_docuno" class="col-form-label">เลขที่เอกสาร</label>
                            <input type="text" class="form-control" name="str_issuestock_hd_docuno" id="str_issuestock_hd_docuno" value="{{$hd->str_issuestock_hd_docuno}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="str_issuestock_hd_depcode" class="col-form-label">แผนก</label>
                            <input type="text" class="form-control" name="str_issuestock_hd_depcode" id="str_issuestock_hd_depcode" value="{{$hd->str_issuestock_hd_depcode}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="approvelsave" class="col-form-label">ผู้อนุมัติ</label>
                            <input type="text" class="form-control" name="approvelsave" id="approvelsave" value="{{$hd->approvelsave}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="str_issuestock_hd_reamrk" class="col-form-label">หมายเหตุ</label>
                            <input type="text" class="form-control" name="str_issuestock_hd_reamrk" id="str_issuestock_hd_reamrk" value="{{$hd->str_issuestock_hd_reamrk}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">                   
                    <div class="table-responsive">
                    <table class="table mb-0 border-collapse">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ลำดับ</th>
                                <th>สินค้า</th>
                                <th>จำนวน</th>
                                <th>สต็อค</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dt as $item)
                                <tr>
                                    @if ($hd->str_issuestock_status_id == 1 || $hd->str_issuestock_status_id == 4)
                                    <td><input class="form-check-input" type="checkbox" value="checked" id="closeButton" readonly></td>
                                    @else
                                    <td><input class="form-check-input" type="checkbox" value="checked" id="closeButton" checked readonly></td>
                                    @endif                                   
                                    <td>{{$item->str_issuestock_dt_listno}}</td>
                                    <td>{{$item->str_issuestock_dt_pdcode}}/{{$item->str_issuestock_dt_pdname}}</td>
                                    <td>{{number_format($item->str_issuestock_dt_pdqty,2)}}/{{$item->str_issuestock_dt_pdunit}}</td>
                                    <td>{{number_format($item->str_issuestock_dt_pdstc,2)}}</td>
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
@endsection
@push('scriptjs')
@endpush               