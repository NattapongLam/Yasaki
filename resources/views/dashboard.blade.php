
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
            @include('layouts.sidebar')
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">     
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <h4 class="card-title" style="text-align: center">นโยบายคุณภาพ</h4>                                    
                                                <p>ผลิตสินค้าที่มีคุณภาพ ได้มาตรฐาน บริหารต้นทุนอย่างมีประสิทธิภาพ ส่งมอบสินค้าถูกต้อง ทันเวลา พัฒนาต่อเนื่อง เพื่อความพึงพอใจของลูกค้า</p>   
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <h4 class="card-title" style="text-align: center">นโยบายด้านสิ่งแวดล้อมและด้านความปลอดภัย</h4>                         
                                            <p>เพื่อให้เป็นการดำรงไว้ควบคุม ดูแลและจัดการบริหารงานด้านสิ่งแวดลอ้มและอาชีวอนามัยและความ
                                                ปลอดภัย ขององค์กร และระบบการจัดการให้มีประสิทธิภาพและเป็นไปอย่างต่อเนื่อง</p>
                                            </div>
                                        </div>                                                                                                                                                                   
                                        <h4 class="card-title">วันหยุดประจำปี 2566</h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>รายละเอียด</th>
                                                        <th>จำนวน</th>
                                                        <th>เพิ่มเติม</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>วันขึ้นปีใหม่ (2 มกราคม)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>วันมาฆบูชา เลื่อนมาหยุด (3 มกราคม)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>วันเข้าพรรษา เลื่อนมาหยุด (4 มกราคม)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>วันสงกรานต์ (13-15 เมษายน)</td>
                                                        <td>3 วัน</td>
                                                        <td>10,11,12 เมษายน ใช้พักร้อน</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>วันแรงงาน (1 พฤษภาคม)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>วันเฉลิมฯสมเด็จพระนางเจ้าสุธิดา (3 มิถุนายน)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>วันเฉลิมฯในหลวงรัชกาลที่ 10 (28 กรกฎาคม)</td>
                                                        <td>1 วัน</td>
                                                        <td>29 กรกฎาคม ใช้พักร้อน</td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>วันเฉลิมฯสมเด็จพระนางเจ้าสิริกิตต์ (12 สิงหาคม)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>วันสวรรคตในหลวงรัชกาลที่ 9 (13 ตุลาคม)</td>
                                                        <td>1 วัน</td>
                                                        <td>14 ตุลาคม ใช้พักร้อน</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>วันเฉลิมฯในหลวงรัชกาลที่ 9 (5 ธันวาคม)</td>
                                                        <td>1 วัน</td>
                                                        <td>4 ธันวาคม ใช้พักร้อน</td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td>วันสิ้นปี (30 ธันวาคม)</td>
                                                        <td>1 วัน</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div><hr>
                                    </div>
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
          </script>
    </body>
</html>