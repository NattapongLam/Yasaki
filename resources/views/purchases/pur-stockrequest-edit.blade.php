@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="POST" class="form-horizontal" action="{{ route('stockrequest.update',$hd->pur_stockrequest_hd_id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="card">
            <div class="card-body">
                @if(auth()->user()->username == "A653615")  
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="pur_stockrequest_status_id" class="col-form-label">สถานะ</label>
                            <select class="form-control" name="pur_stockrequest_status_id" id="pur_stockrequest_status_id">
                                @foreach ($sta as $item)
                                <option value="{{$item->pur_stockrequest_status_id}}">{{$item->pur_stockrequest_status_name}}</option>
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
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">บันทึกข้อมูล</button>  
                </div>
                @endif  
            </div>
        </div>
        </form>
        <div class="card">
            <div class="card-body">  
                <h5>รายละเอียด</h5>          
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="docudate" class="col-form-label">วันที่</label>
                            <input type="date" class="form-control" name="docudate" id="docudate" value="{{$hd->docudate}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="docuno" class="col-form-label">เลขที่เอกสาร</label>
                            <input type="text" class="form-control" name="docuno" id="docuno" value="{{$hd->docuno}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="departmentcode" class="col-form-label">แผนก</label>
                            <input type="text" class="form-control" name="departmentcode" id="departmentcode" value="{{$hd->departmentcode}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="remark1" class="col-form-label">หมายเหตุ 1</label>
                            <input type="text" class="form-control" name="remark1" id="remark1" value="{{$hd->remark1}}" readonly>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="remark2" class="col-form-label">หมายเหตุ 2</label>
                            <input type="text" class="form-control" name="remark2" id="remark2" value="{{$hd->remark2}}" readonly>
                        </div>
                    </div>                   
                </div><hr>
                <div class="row">                   
                    <div class="table-responsive">
                    <table class="table mb-0 border-collapse">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>วันที่ต้องการ</th>
                                <th>สินค้า</th>
                                <th>จำนวน</th>
                                <th>Stock</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>ค้างรับ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dt as $item)
                                <tr>
                                    <td>{{$item->listno}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->wantdate)->format('d/m/Y')}}</td>
                                    <td>{{$item->itemcode}}/{{$item->itemname}}</td>
                                    <td>{{number_format($item->qty,2)}}/{{$item->unitname}}</td>
                                    <td>{{number_format($item->stockqty,2)}}</td>
                                    <td>{{number_format($item->stockmin,2)}}</td>
                                    <td>{{number_format($item->stockmax,2)}}</td>
                                    <td>{{number_format($item->remaininqty,2)}}</td>
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