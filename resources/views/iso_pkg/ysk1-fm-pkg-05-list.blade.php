@extends('layouts.main')
@section('content')
 <!-- DataTables -->
 <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
 <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
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
                <form method="GET" class="form-horizontal">
                @csrf
                <div class="row">                    
                    <div class="col-12 col-md-3">
                        <h4 class="card-title mb-4">
                            บันทึกน้ำหนักสินค้าบรรจุภัณฑ์
                        </h4>
                    </div>
                    <div class="col-12 col-md-3">
                        <a href="{{route('iso-pkg-05.create')}}" class="btn btn-primary w-sm waves-effect waves-light">
                            <i class="fas fa-plus"></i> เพิ่มรายการ</a> 
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="date" 
                        name="datestart" 
                        id="datestart" 
                        class="form-control"
                        value="{{$datestart}}">
                    </div>
                    <div class="col-12 col-md-2">
                        <input type="date" 
                        name="dateend" 
                        id="dateend" 
                        class="form-control"
                        value="{{$dateend}}">
                    </div>
                    <div class="col-12 col-md-2">
                        <button class="btn btn-info w-lg">
                            <i class="fas fa-search"></i> ค้นหา
                        </button>
                    </div>                                       
                </div>
                </form>
                <div class="row">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>สินค้า</th>
                                    <th>จำนวนบรรจุ</th>
                                    <th>น้ำหนัก</th>
                                    <th></th>
                                </tr>
                            </thead>     
                            <tbody>
                                @foreach ($hd as $item)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($item->date)->format('d/m/Y')}}</td>
                                        <td>{{$item->productcode}}/{{$item->productname}}</td>
                                        <td>{{$item->packqty}}</td>
                                        <td>{{$item->kgqty}}</td>
                                        <td>
                                            <a href="{{route('iso-pkg-05.edit',$item->id)}}"
                                                class="btn btn-sm btn-warning">
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
@endsection
@push('scriptjs')
<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>      
<script>   
</script>
@endpush
