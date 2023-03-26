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
                                @role('superadmin|admin') 
                                <li><a href="{{route('documentcontrolmasterlist.list')}}" key="t-default">บัญชีแม่บทเอกสาร</a></li>   
                                <li><a href="{{route('documentcontrolholderlist.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                @endrole
                                <li><a href="{{route('documentcontrolformmasterlist.list')}}" key="t-default">ฟอร์มแม่บทเอกสาร</a></li>  
                            </ul>
                        </li>
                        @role('superadmin|admin') 
                        <li>                           
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">IT</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{route('documentcontrolictcomlist.list')}}" key="t-default">ทะเบียนอุปกรณ์ICT01</a></li>
                                <li><a href="{{route('documentcontrolictplan.list')}}" key="t-default">แผนบำรุงรักษาICT02</a></li>
                                <li><a href="#" key="t-default">ใบขอใช้บริการICT03</a></li>
                                <li><a href="{{route('documentcontrolictcheck.list')}}" key="t-default">ใบเช็คการบำรุงรักษาICT04</a></li>
                                <li><a href="#" key="t-default">ใบแก้ไขอุปกรณ์ICT05</a></li>
                                <li><a href="#" key="t-default">ประวัติอุปกรณ์ICT06</a></li>
                                <li><a href="{{route('documentcontrolictbackup.list')}}" key="t-default">LogBackupICT07</a></li>
                                <li><a href="{{route('kpiit.list')}}" key="t-default">KPI-ICT</a></li>
                                <li><a href="{{route('isoit.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                
                            </ul>                         
                        </li>
                        @endrole
                        @role('superadmin|admin|DCT') 
                        <li>
                           
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">DCT</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isodct.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkdct.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                          
                        </li>
                        @endrole
                        @role('superadmin|admin|HTP') 
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">HTP</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isohtp.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkhtp.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|MCH') 
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">MCH</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isomch.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkmch.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|PTG')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">PTG</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoptg.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkptg.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|ASB')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">ASB</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoasb.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkasb.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|PTG|PKG')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">PKG</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isopkg.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkpkg.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|QCC')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">QCC</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoqcc.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkqcc.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|MLD')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">MLD</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isomld.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkmld.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|DLV')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">DLV</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isodlv.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                                <li><a href="{{route('mcchkdlv.list')}}" key="t-default">ตรวจสอบเครื่องจักรประจำวัน</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|STR')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">STR</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isostr.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|CLB')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">CLB</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoclb.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>
                        @endrole
                        @role('superadmin|admin|HRM')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">HR</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isohr.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li> 
                        @endrole
                        @role('superadmin|admin|MTN')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">MTN</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isomtn.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>    
                        @endrole  
                        @role('superadmin|admin|PDT')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">PDT</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoptd.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>       
                        @endrole 
                        @role('superadmin|admin|PUR')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">PUR</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isopur.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>    
                        @endrole  
                        @role('superadmin|admin')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">QMR</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isoqmr.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>  
                        @endrole 
                        @role('superadmin|admin|SAL')
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">SAL</a>
                            <ul class="sub-menu" aria-expanded="true">                      
                                <li><a href="{{route('isosal.list')}}" key="t-default">ทะเบียนผู้ถือครอง</a></li> 
                            </ul>
                        </li>     
                        @endrole       
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
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-id-card"></i>
                        <span key="t-dashboards">ฝ่ายบุคคล</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('leavedocuno.list')}}" key="t-default">บันทึกการลา</a></li>      
                        <li><a href="{{route('leavedocapproval.list')}}" key="t-default">อนุมัติการลา</a></li>                   
                    </ul>
                </li>
                <li class="menu-title" key="t-apps">Report</li>  
                @role('superadmin|MTN') 
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-graph-line"></i>
                        <span key="t-dashboards">รายงานซ่อมบำรุง</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('mtnreport.mtnday.index')}}" key="t-default">รายงานการซ่อม-รายวัน</a></li>  
                        <li><a href="{{route('mtnreport.mtnmonth.index')}}" key="t-default">รายงานการซ่อม-รายเดือน</a></li>     
                    </ul>
                </li>  
                @endrole
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-graph-bar"></i>
                        <span key="t-dashboards">รายงานบุคคล</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('empreport.emptime.index')}}" key="t-default">รายงานตรวจสอบเวลา</a></li>  
                        <li><a href="#" key="t-default">รายงานตรวจสอบการลา</a></li>     
                    </ul>
                </li>                                                      
                <li class="menu-title" key="t-pages">Setting</li>
                @role('superadmin|admin') 
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
                @endrole
                @role('superadmin|MTN')  
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
                @endrole
                @role('superadmin|HRM')               
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าบุคคล</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('departmentlist.list')}}" key="t-default">รายชื่อแผนก</a></li>  
                        <li><a href="{{route('employeelist.list')}}" key="t-default">รายชื่อพนักงาน</a></li>    
                        <li><a href="{{route('leaveconfig.list')}}" key="t-default">ตั้งค่าการลา</a></li>
                        <li><a href="{{route('leavetype.list')}}" key="t-default">ประเภทการลา</a></li>
                        <li><a href="{{route('leaveapproval.list')}}" key="t-default">ตั้งค่าสายอนุมัติ</a></li>   
                    </ul>
                </li>
                @endrole
                @role('superadmin')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-list"></i>
                        <span key="t-dashboards">ตั้งค่าระบบ</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('employee.list')}}" key="t-default">ผู้ใช้งานระบบ</a></li>    
                    </ul>
                </li>
                @endrole
                <li class="menu-title" key="t-components">BI Analytics</li>                                   
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>