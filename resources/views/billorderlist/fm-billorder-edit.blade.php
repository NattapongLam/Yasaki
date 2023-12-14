@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" class="form-horizontal" action="{{ route('billorder.update',$hd->DocNo) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4 class="card-title mb-4">เลขที่ : {{$hd->DocNo}} ลูกค้า : {{$hd->ARNAME}}</h4>
                <h5>ที่อยู่ : {{$hd->ARADDRESS}}</h5>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>สินค้า</th>
                                <th>จำนวนสั่ง</th>
                                <th>จำนวนจัด</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dt as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->ItemCode}}/{{$item->ItemName}}</td>
                                    <td>{{number_format($item->Qty,2)}}</td>
                                    <td>
                                        <input class="form-control" type="number" name="dt_qty[]" value="{{old('dt_qty',number_format($item->Qty,0))}}">
                                        <input class="form-control" type="hidden" name="dt_id[]" value="{{$item->ROWORDER}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>   
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
@endpush