@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">{{$rm->Code}}/{{$rm->Name1}}</h3>
            </div>
            <div class="card-body"> 
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>วันที่ขอซื้อ</th>
                                <th>เลขที่ขอซื้อ</th>
                                <th>เลขที่สั่งซื้อ</th>
                                <th>กำหนดของเข้า</th>
                                <th>จำนวน</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @foreach ($pr as $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->DocDate)->format('d/m/Y')}}</td>
                                    <td>{{$item->DocNo}}</td>
                                    <td>{{$item->PoDocNo}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->DueDate)->format('d/m/Y')}}</td>
                                    <td>{{number_format($item->Total,2)}}</td>                             
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">ประวัติการซื้อ</h3>
            </div>
            <div class="card-body"> 
                <div class="table-responsive">
                    <table id="tb_job" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>วันที่รับสินค้า</th>
                                <th>เลขที่รับสินค้า</th>
                                <th>ผู้จำหน่าย</th>
                                <th>ราคาต่อหน่วย</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($price as $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->DocDate)->format('d/m/Y')}}</td>
                                    <td>{{$item->DocNo}}</td>
                                    <td>{{$item->ApCode}}/{{$item->Name1}}</td>
                                    @auth
                                    @if(auth()->user()->type == "Admin" || auth()->user()->type == "PUR")
                                    <td>{{number_format($item->Price,2)}}</td>
                                    @else
                                    <td>{{number_format(0,2)}}</td>
                                    @endif   
                                    @endauth  
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
<script>
    previewAttach = (path) => {
            Swal.fire({
                imageUrl: `{{ asset('${path}') }}`,
                imageHeight: 350,
                imageWidth: 350,
                imageClass: 'img-responsive rounded-circle',
            })
        }
</script>
