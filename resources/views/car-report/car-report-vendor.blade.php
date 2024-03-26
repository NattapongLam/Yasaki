<!doctype html>
<html lang="en">
    <head>      
        <meta charset="utf-8" />
        <title>@yield('title','YASAKI')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.ico')}}">
        <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
        <link href="{{URL::asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />   
        @livewireStyles
    </head>
    <body data-sidebar="dark" data-layout-mode="light">
        <div id="layout-wrapper">
            @include('layouts.head')                  
            <!-- ========== Left Sidebar Start ========== -->
            {{-- @include('layouts.sidebar') --}}
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
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
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">ตอบกลับใบร้องขอให้มีการแก้ไขและป้อง (CAR)</h3>
                                <div class="row">
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="col-form-label">วันที่</label>
                                            <input class="form-control" value="{{$hd->car_report_date}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="col-form-label">เลขที่</label>
                                            <input class="form-control" value="{{$hd->car_report_docuno}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="col-form-label">ผู้รายการ</label>
                                            <input class="form-control" value="{{$hd->car_report_save}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="col-form-label">ประเภท</label>
                                            <input class="form-control" value="{{$hd->car_report_severe}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="col-form-label">เรื่องที่เกี่ยวข้อง</label>
                                            <input class="form-control" value="{{$hd->car_report_process}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="col-form-label">รายการปัญหา</label>
                                            <input class="form-control" value="{{$hd->ref_cause}}" readonly>
                                        </div>
                                    </div>           
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">รายละเอียดข้อพกพร่องที่พบ</label>
                                            <textarea class="form-control" rows="5" readonly>{{$hd->car_report_remark}}</textarea>
                                        </div>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <img class="img-thumbnail" src="{{ asset($hd->car_report_webpic1)}}">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img class="img-thumbnail" src="{{ asset($hd->car_report_webpic2)}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">กรุณาตอบ</h3>
                                <form method="POST" class="form-horizontal" action="{{ route('car.update',$hd->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">สาเหตุของข้อพกพร่อง</label>
                                            <textarea class="form-control" rows="5" name="car_report_cause" id="car_report_cause"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">การแก้ไขปัญหาเพื่อกำจัดสาเหตุของปัญหา</label>
                                            <textarea class="form-control" rows="5" name="car_report_correct" id="car_report_correct"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">การป้องกันไม่ให้ปัญหาเกิดซ้ำ</label>
                                            <textarea class="form-control" rows="5" name="car_report_prevent" id="car_report_prevent"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">วันที่จะแล้วเสร็จ</label>
                                            <input class="form-control" type="date" name="persondate" id="persondate">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">ลงชื่อ</label>
                                            <input class="form-control" type="text" name="person_web" id="person_web">
                                        </div>
                                    </div>          
                                </div><br>
                                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                                </form>
                            </div>
                        </div>
                        </div>                 
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->               
                @include('layouts.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>       
        <!-- JAVASCRIPT -->
        <script src="{{URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/app.js')}}"></script>
        <script src="{{URL::asset('assets/libs/select2/js/select2.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/pages/datatables.init.js')}}"></script>     
        <!-- toastr plugin -->
        <script src="{{ asset('/assets/libs/toastr/toastr.min.js') }}"></script>
        <!-- toastr init -->
        <script src="{{ asset('/assets/js/pages/toastr.init.js') }}"></script>   
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('swal',function(e){
              Swal.fire({
                title: e.detail.title,
                timer: e.detail.timer,
                icon: e.detail.icon
              }).then(function(){
                if(e.detail.url){
                  window.location = e.detail.url;
                }
              })
            })
            window.livewire.on("modalHide",() => {
              $("#exampleModal").modal("hide");
            })
            $(document).ready(function() {
            $('#tb_job').DataTable({             
                "autoWidth": false,
                "pageLength": 20,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 0, "desc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
            });
          </script>
          @stack('scriptjs')
    </body>
</html>
