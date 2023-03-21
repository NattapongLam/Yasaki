@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    <h3 class="card-title">รายงานการซ่อมเครื่องจักร-รายวัน</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="GET" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-1">
                                        <label for="machinery_hd_docuno" class="col-form-label">ระบุเลขที่เอกสาร</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" 
                                        name="machinery_hd_docuno" 
                                        id="machinery_hd_docuno" 
                                        class="form-control"
                                        value="">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="department_name" class="col-form-label">เลือกแผนก</label>
                                    </div>
                                    <div class="col-sm-2">
                                            <select type="text" 
                                            name="department_name" 
                                            id="department_name" 
                                            class="form-control">
                                           @if($dep)
                                           <option value="{{$dep}}">{{$dep}}</option>
                                           @else
                                           <option value="">-- แผนก --</option>
                                           @endif                                          
                                            @foreach ($deplist as $item)
                                            <option value="{{$item->department_name}}">{{$item->department_name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="department_name" class="col-form-label">วันที่เริ่ม</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" 
                                        name="datestart" 
                                        id="datestart" 
                                        class="form-control"
                                        value="">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="department_name" class="col-form-label">วันที่สิ้นสุด</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" 
                                        name="dateend" 
                                        id="dateend" 
                                        class="form-control"
                                        value="">
                                    </div>                                  
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-2">
                                        <button class="btn btn-info w-lg">
                                            <i class="fas fa-search"></i> ค้นหา
                                        </button>
                                    </div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2"></div>
                                    <div class="col-2" style="text-align: right">
                                        <a class="btn btn-light" href="{{route('mtnreport.mtnday.excel')}}">
                                            Excel
                                        </a>
                                        <a class="btn btn-light" href="{{route('mtnreport.mtnday.pdf')}}">
                                            PDF
                                        </a>
                                    </div>                                     
                                </div>                              
                            </form>
                        </div>
                    </div><br>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">สถานะ</th>
                                    <th>วันที่</th>
                                    <th>เลขที่เอกสาร</th>
                                    <th>แผนก</th>
                                    <th>ประเภทงาน</th>
                                    <th>ระบบ</th>
                                    <th>บริการ</th>
                                    <th>เครื่องจักร</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="text-align: center">{{$loop->index+1}}</td>
                                        <td style="text-align: center">
                                        @if ($item->sta_name == "รอดำเนินการ")
                                        <span class="badge bg-warning">รอดำเนินการ</span>
                                        @elseif($item->sta_name == "ยกเลิก")  
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @elseif($item->sta_name == "ดำเนินการแล้ว") 
                                        <span class="badge bg-success">ดำเนินการแล้ว</span>
                                        @elseif($item->sta_name == "ตรวจสอบแล้ว") 
                                        <span class="badge bg-info">ตรวจสอบแล้ว</span>
                                        @endif
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($item->machinery_hd_date)->format('d/m/Y')}}</td>
                                        <td>{{$item->machinery_hd_docuno}}</td>
                                        <td>{{$item->department_name}}</td>
                                        <td>{{$item->machinery_hd_type}}</td>
                                        <td>{{$item->ms_machine_system_name}}</td>
                                        <td>{{$item->ms_machine_service_name}}</td>
                                        <td>{{$item->ms_machine_name}} ({{$item->ms_machine_code}})</td>
                                        <td></td>
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