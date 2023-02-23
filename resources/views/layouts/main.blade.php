
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
                        @yield('content')                        
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
