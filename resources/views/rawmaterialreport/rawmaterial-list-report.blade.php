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
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">สินค้าสำเร็จรูป</h3>
            </div>
            <div class="card-body"> 
                <div class="row">
                @foreach ($fg as $item)
                <div class="col-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-4">
                                    <div class="avatar-md">
                                        <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                            <img src="assets/images/product/{{asset($item->PicFileName1)}}" alt="" height="70">
                                            </button>
                                        </span>
                                    </div>
                                </div>                                        
                                <div class="flex-grow-1 overflow-hidden">                                               
                                    <h5 class="text-truncate font-size-15">{{$item->Code}}</h5>                                           
                                    <p class="text-muted mb-4">{{$item->Name1}}</p>
                                    <div class="avatar-group">
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName2}}')">
                                                <img src="assets/images/product/{{asset($item->PicFileName2)}}" alt="" class="rounded-circle avatar-xs">
                                                </button>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName3}}')">
                                                <img src="assets/images/product/{{asset($item->PicFileName3)}}" alt="" class="rounded-circle avatar-xs">
                                                </button>
                                            </a>
                                        </div>
                                        <div class="avatar-group-item">
                                            <a href="javascript: void(0);" class="d-inline-block">
                                                <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName4}}')">
                                                <img src="assets/images/product/{{asset($item->PicFileName4)}}" alt="" class="rounded-circle avatar-xs">
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 border-top">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-success">สต็อค : {{number_format($item->StockQty,2)}}</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-warning">ค้างรับ : {{number_format($item->RemainInQty,2)}}</span>
                                </li>
                                <li class="list-inline-item me-3">
                                    <span class="badge bg-danger">ยอดจอง : {{number_format($item->ReserveQty,2)}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach 
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
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
