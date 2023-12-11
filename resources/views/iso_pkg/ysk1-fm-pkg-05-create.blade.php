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
        <form method="POST" class="form-horizontal" action="{{ route('iso-pkg-05.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">
                    กรอกข้อมูล
                </h4>
                <div class="row">                  
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="date" class="col-form-label">ชื่องาน</label>
                                <select class="form-select" id="productcode" name="productcode">
                                    <option value="">กรุณาเลือกชิ้นงาน</option>
                                    @foreach ($hd as $item)
                                    <option value="{{$item->Code}}">{{$item->Code}}/{{$item->Name1}}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">วันที่</label>
                            <input class="form-control" type="date" name="date" id="date" value="{{old('date', date('Y-m-d'))}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">จำนวนบรรจุต่อกล่อง</label>
                            <input class="form-control" type="number" name="packqty" id="packqty" value="{{old('packqty',0)}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="date" class="col-form-label">น้ำหนักที่ควบคุม</label>
                            <input class="form-control" type="text" name="kgqty" id="kgqty" value="{{old('kgqty',0)}}">
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
$(document).ready(function()
{  
    $("#productcode").select2();
});
</script>
@endpush