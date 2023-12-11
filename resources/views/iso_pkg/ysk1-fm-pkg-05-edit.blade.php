@extends('layouts.main')
@section('content')
 <!-- DataTables -->
 <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
 <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
 <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
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
        <form method="POST" class="form-horizontal" action="{{ route('iso-pkg-05.update',$hd->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    กรอกข้อมูล ID : {{$hd->id}} / Code : {{$hd->productcode}}
                </h4>
                <div class="row">                  
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="date" class="col-form-label">ชื่องาน</label>
                             <input class="form-control" type="hidden" name="productcode" id="productcode">
                             <input class="form-control" type="text" name="productname" id="productname" value="{{$hd->productname}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">วันที่</label>
                            <input class="form-control" type="date" name="date" id="date" value="{{$hd->date}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">จำนวนบรรจุต่อกล่อง</label>
                            <input class="form-control" type="number" name="packqty" id="packqty" value="{{$hd->packqty}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">น้ำหนักที่ควบคุม</label>
                            <input class="form-control" type="text" name="kgqty" id="kgqty" value="{{$hd->kgqty}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">น้ำหนักชั่ง</label>
                            <input class="form-control" type="text" name="qty" id="qty" value="{{old('qty',0)}}">
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">เพิ่มข้อมูล</button>  
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">รายละเอียด</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>น้ำหนักชั่งได้ต่อกล่อง</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @foreach ($dt as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->qty}}</td>
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
<script src="assets/libs/select2/js/select2.min.js"></script>  
<script>   
</script>
@endpush