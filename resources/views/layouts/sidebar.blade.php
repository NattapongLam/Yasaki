<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-gear"></i>
                        <span key="t-dashboards">ฝ่ายซ่อมบำรุง</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-default">แจ้งซ่อมเครื่องจักร</a></li>                        
                    </ul>
                </li>
                <li class="menu-title" key="t-apps">Report</li>  
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-graph-bar"></i>
                        <span key="t-dashboards">รายงานซ่อมบำรุง</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-default">รายงานแจ้งซ่อมเครื่องจักร</a></li>     
                    </ul>
                </li>                                                      
                <li class="menu-title" key="t-pages">Setting</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าเครื่องจักร</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('machinegroup.list')}}" key="t-default">กลุ่มเครื่องจักร</a></li>
                        <li><a href="#" key="t-default">เครื่องจักร</a></li>
                        <li><a href="{{route('machinesystem.list')}}" key="t-default">ประเภทแจ้งซ่อม</a></li>     
                        <li><a href="{{route('machineservice.list')}}" key="t-default">บริการแจ้งซ่อม</a></li>      
                    </ul>
                </li>
                <li class="menu-title" key="t-components">BI Analytics</li>                                   
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>