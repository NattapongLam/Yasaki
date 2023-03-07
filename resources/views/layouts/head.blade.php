<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="{{route('dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{URL::asset('assets/images/logo_yasaki.png')}}" alt="" height="33">
                    </span>
                    <span class="logo-lg">
                        <img src="{{URL::asset('assets/images/logo_yasaki.png')}}" alt="" height="114">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ isset(auth()->user()->avatar) ? URL::asset('images/employees/'.auth()->user()->avatar) : URL::asset('assets/images/logo_yasaki.png')}}"
                        alt="Header Avatar">
                        @auth
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{auth()->user()->name}}</span>                          
                        @else
                        <a href="{{route('login')}}" class="d-none d-xl-inline-block ms-1">Login</a>
                        @endauth
                   
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="javascript:void();" 
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                    <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                    <span key="t-logout">Logout</span></a>
                    <form id="form-logout" action="{{route('logout')}}" method="post" style="display: none;">
                        @csrf          
                    </form>  
                </div>
            </div>
        </div>
    </div>
</header>