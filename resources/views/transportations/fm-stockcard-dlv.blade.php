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
                <h3 class="card-title">สต็อคสินค้า</h3>
                <form method="POST" class="form-horizontal" action="{{ route('stock-sale.update',true) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <select class="form-control" id="types" name="types">
                                <option value="">กรุณาเลือก</option>
                                <option value="ผ้าเบรค">ผ้าเบรค</option>
                                <option value="ดิสเบรค">ดิสเบรค</option>
                                <option value="ดุมรวม">ดุมรวม</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">อัพเดท</button>  
                        </div>
                    </div>                
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-10">
                        <div class="card">
                            <ul class="nav nav-tabs nav-tabs-custom justify-content-center pt-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#postbrake" role="tab">
                                       001:ผ้าเบรค
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#postdis" role="tab">
                                        002:ดิสเบรค
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post003" role="tab">
                                        003:มือคลัทช์
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post004" role="tab">
                                        004:มือเบรค
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post005" role="tab">
                                        005:หูจับกระจก
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post006" role="tab">
                                        006:ฝาวาล์ว
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post007" role="tab">
                                        007:ดุมจับสเตอร์
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post008" role="tab">
                                        008:ดุมหน้าดิส
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post009" role="tab">
                                        009:ดุมหลังดรัม
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post010" role="tab">
                                        010:ปะกับเร่ง
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post011" role="tab">
                                        011:ชามคลัทช์
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post013" role="tab">
                                        013:แผงเบรค
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post014" role="tab">
                                        014:ดุมหน้าดรัม
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#post015" role="tab">
                                        015:ดุมหลังดิส
                                    </a>
                                </li>
                            </ul>
                               <!-- Tab panes -->
                            <div class="tab-content p-4">
                                <div class="tab-pane active" id="postbrake" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_b" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd1 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>    
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                     
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="postdis" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_d" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd2 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>  
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                     
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post003" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_3" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd3 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>   
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                    
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post004" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_4" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd4 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td> 
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                      
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post005" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_5" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd5 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>   
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                    
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post006" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_6" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd6 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>  
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                     
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post007" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_7" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd7 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>   
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                    
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post008" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_8" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd8 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>     
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                  
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post009" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_9" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd9 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>     
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                  
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post010" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_10" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd10 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>  
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                     
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post011" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_11" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd11 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td> 
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                      
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post013" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_13" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd13 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>  
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                     
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post014" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_14" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd14 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td> 
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </td>                                                      
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="post015" role="tabpanel">
                                    <div class="table-responsive">
                                        <table id="tb_fg_15" class="table table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th class="text-center">รูปภาพ</th>                                             
                                                    <th class="text-center">รหัสสินค้า</th>
                                                    <th class="text-center">ชื่อสินค้า</th>
                                                    <th class="text-center">จำนวน</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($hd15 as $item)
                                                    <tr>       
                                                        <td class="text-center">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                                <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                            </button>
                                                        </td>                                              
                                                        <td class="text-center">{{$item->Code}}</td>
                                                        <td class="text-center">{{$item->Name1}} ({{$item->Name2}})</td> 
                                                        <td class="text-center">{{number_format($item->StockQty,2)}}</td>    
                                                        <td class="text-center">
                                                            <a href="{{route('stock-sale.show',$item->Code)}}" class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>
    $(document).ready(function() {
            $('#tb_fg_b').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_d').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_3').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_4').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_5').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_6').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_7').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_8').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_9').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_10').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_11').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_13').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_14').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    $(document).ready(function() {
            $('#tb_fg_15').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 3, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
    previewAttach = (path) => {
            Swal.fire({
                imageUrl: `{{ asset('${path}') }}`,
                imageHeight: 350,
                imageWidth: 350,
                imageClass: 'img-responsive rounded-circle',
            })
    }
</script>
@endpush