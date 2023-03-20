<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">ฝ่ายระบบควบคุมคุณภาพ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">DCC</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('documentcontrolmasterlist.list')}}" key="t-default">บัญชีแม่บทเอกสาร</a></li>   
                                <li><a href="#" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">ICT</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('documentcontrolictcomlist.list')}}" key="t-default">ทะเบียนอุปกรณ์ICT01</a></li>
                                <li><a href="{{route('documentcontrolictplan.list')}}" key="t-default">แผนบำรุงรักษาICT02</a></li>
                                <li><a href="#" key="t-default">ใบขอใช้บริการICT03</a></li>
                                <li><a href="#" key="t-default">ใบเช็คการบำรุงรักษาICT04</a></li>
                                <li><a href="#" key="t-default">ใบแก้ไขอุปกรณ์ICT05</a></li>
                                <li><a href="#" key="t-default">ประวัติอุปกรณ์ICT06</a></li>
                                <li><a href="{{route('documentcontrolictbackup.list')}}" key="t-default">LogBackupICT07</a></li>
                                <li><a href="#" key="t-default">KPI-ICT</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">DCT</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isodct.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="#" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">HTP</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isohtp.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="#" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">MCH</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isomch.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="#" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">PTG</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoptg.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="#" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">ASB</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoasb.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="#" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">PKG</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isopkg.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="#" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-gear"></i>
                        <span key="t-dashboards">ฝ่ายซ่อมบำรุง</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('machinerylist.list')}}" key="t-default">แจ้งซ่อมเครื่องจักร</a></li>    
                        <li><a href="{{route('machineryreport.list')}}" key="t-default">รายการแจ้งซ่อมรอตรวจรับ</a></li>                    
                    </ul>
                </li>
                <li class="menu-title" key="t-apps">Report</li>  
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-graph-bar"></i>
                        <span key="t-dashboards">รายงานซ่อมบำรุง</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                             
                    </ul>
                </li>                                                      
                <li class="menu-title" key="t-pages">Setting</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าระบบควบคุมคุณภาพ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('documentcontrolgroup.list')}}" key="t-default">มาตราฐานระบบ</a></li>  
                        <li><a href="{{route('documentcontroltype.list')}}" key="t-default">ประเภทเอกสารควบคุม</a></li>    
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าเครื่องจักร</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('machinegroup.list')}}" key="t-default">กลุ่มเครื่องจักร</a></li>
                        <li><a href="{{route('machine.list')}}" key="t-default">เครื่องจักร</a></li>
                        <li><a href="{{route('machinesystem.list')}}" key="t-default">ประเภทแจ้งซ่อม</a></li>     
                        <li><a href="{{route('machineservice.list')}}" key="t-default">บริการแจ้งซ่อม</a></li>      
                    </ul>
                </li>               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าพนักงาน</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('departmentlist.list')}}" key="t-default">รายชื่อแผนก</a></li>  
                        <li><a href="{{route('employeelist.list')}}" key="t-default">รายชื่อพนักงาน</a></li>    
                        <li><a href="{{route('leaveconfig.list')}}" key="t-default">ตั้งค่าการลา</a></li>
                        <li><a href="{{route('leaveapproval.list')}}" key="t-default">ตั้งค่าสายอนุมัติ</a></li>   
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าระบบ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="{{route('menulist.list')}}" key="t-default">กำหนดเมนู</a></li>    --}}
                        <li><a href="{{route('employee.list')}}" key="t-default">ผู้ใช้งานระบบ</a></li>    
                    </ul>
                </li>
                <li class="menu-title" key="t-components">BI Analytics</li>                                   
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>