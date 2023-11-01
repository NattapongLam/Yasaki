@extends('layouts.main')
@section('content')
 <!-- DataTables -->
 <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <!-- Responsive datatable examples -->
 <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">รายการใบส่งสินค้า</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>กำหนดส่ง</th>
                                <th>วันที่ออกเอกสาร</th>
                                <th>เลขที่ใบส่งสินค้า</th>
                                <th></th>
                            </tr>
                        </thead>     
                        <tbody>
                            @foreach ($hd as $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->DeliveryDate)->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->DocDate)->format('d/m/Y')}}</td>
                                    <td>{{$item->DocNo}}</td>
                                    <td>
                                        <a href="{{route('billorder.edit',$item->DocNo)}}"
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