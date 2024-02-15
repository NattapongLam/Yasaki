@extends('layouts.main')
@section('content')
<link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    <h3 class="card-title">ใบขอใช้บริการ (YSK1-FM-ICt-03) R.01-20240216</h3>
                </div>
                <form method="POST" class="form-horizontal" action="{{ route('ict-03.update',$hd->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ประเภทการขอใช้บริการ</label>
                            <select class="form-control  @error('serv_type') is-invalid @enderror" name="serv_type" id="serv_type" autofocus required>
                               <option value="{{$hd->serv_type}}">{{$hd->serv_type}}</option>
                               <option value="ขอใช้คอมพิวเตอร์ในระบบ">ขอใช้คอมพิวเตอร์ในระบบ</option>
                               <option value="แจ้งซ่อมแก้ไขปัญหาคอมฯ/ระบบคอมฯ">แจ้งซ่อมแก้ไขปัญหาคอมฯ/ระบบคอมฯ</option>
                            </select>
                            @error('serv_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                           
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ชื่อ - นามสกุล</label>
                            <select class="form-control @error('serv_user') is-invalid @enderror" name="serv_user" id="serv_user" autofocus required>
                                <option value="">กรุณาเลือก</option>
                                @foreach ($emp as $item)
                                   <option value="{{$item->employee_code}}" {{ old('serv_user', $hd->serv_user) == $item->employee_code ? 'selected' : null }}>
                                    {{$item->employee_fullname}} ({{$item->employee_code}})
                                </option> 
                                @endforeach
                             </select>
                             @error('serv_user')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                            
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">แผนก</label>
                            <select class="form-control @error('serv_dep') is-invalid @enderror" name="serv_dep" id="serv_dep" autofocus required>
                                <option value="">กรุณาเลือก</option>
                                @foreach ($dep as $item)
                                   <option value="{{$item->department_refcode}}" {{ old('serv_user', $hd->serv_dep) == $item->department_refcode ? 'selected' : null }}>
                                    {{$item->department_name}}</option> 
                                @endforeach
                             </select>
                             @error('serv_dep')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror                             
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">รหัสคอมพิวเตอร์</label>
                            <select class="form-control @error('serv_com') is-invalid @enderror" name="serv_com" id="serv_com" autofocus required>
                                <option value="">กรุณาเลือก</option>
                                @foreach ($com as $item)
                                   <option value="{{$item->com_name}}" {{ old('serv_com', $hd->serv_com) == $item->com_name ? 'selected' : null }}>
                                    {{$item->com_name}} ({{$item->com_users}})</option> 
                                @endforeach
                             </select>
                             @error('serv_com')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror                         
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ประเภทอุปกรณ์</label>
                            <select class="form-control @error('serv_case') is-invalid @enderror" name="serv_case" id="serv_case" autofocus required>
                               <option value="{{$hd->serv_case}}">{{$hd->serv_case}}</option>
                               <option value="อุปกรณ์ต่อพ่วง">อุปกรณ์ต่อพ่วง</option>
                               <option value="เครื่องคอมพิวเตอร์">เครื่องคอมพิวเตอร์</option>
                               <option value="ระบบเครือข่าย">ระบบเครือข่าย</option>
                               <option value="โปรแกรมคอมพิวเตอร์">โปรแกรมคอมพิวเตอร์</option>
                            </select>
                            @error('serv_case')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                             
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="form-group">
                            <label class="col-form-label">อาการเสียเบื้องต้น</label>
                            <input type="text" class="form-control  @error('serv_remark') is-invalid @enderror" name="serv_remark" id="serv_remark" value="{{$hd->serv_remark}}" autofocus required>
                            @error('serv_remark')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                          
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ผู้ขอใช้บริการ</label>   
                            <select class="form-control @error('personsave') is-invalid @enderror" name="personsave" id="personsave" autofocus required>
                                <option value="">กรุณาเลือก</option>
                                @foreach ($emp as $item)
                                   <option value="{{$item->employee_code}}" {{ old('personsave', $hd->personsave) == $item->employee_code ? 'selected' : null }}>
                                    {{$item->employee_fullname}} ({{$item->employee_code}})</option> 
                                @endforeach
                             </select>
                             @error('personsave')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                                                   
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="form-group">
                            <label class="col-form-label">แนวทางการแก้ไข</label>
                            <input type="text" class="form-control" name="serv_note" id="serv_note" value="{{$hd->serv_note}}">                           
                        </div>
                    </div>                   
                </div>
                <div class="row">                    
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ผู้จัดการฝ่าย</label>
                            <select class="form-control" name="personcheck" id="personcheck">
                                <option value="">กรุณาเลือก</option>
                                @foreach ($emp as $item)
                                   <option value="{{$item->employee_code}}"  {{ old('personcheck', $hd->personcheck) == $item->employee_code ? 'selected' : null }}>
                                    {{$item->employee_fullname}} ({{$item->employee_code}})</option> 
                                @endforeach
                            </select>                
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">เจ้าหน้าที่ ICT</label>
                            <select class="form-control" name="personict" id="personict">
                                <option value="">กรุณาเลือก</option>
                                @foreach ($emp as $item)
                                   <option value="{{$item->employee_code}}" {{ old('personict', $hd->personict) == $item->employee_code ? 'selected' : null }}>
                                    {{$item->employee_fullname}} ({{$item->employee_code}})</option> 
                                @endforeach
                             </select>            
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">วันที่ปิดงาน</label>
                            <input type="date" class="form-control" name="closeit_date" id="closeit_date" value="{{$hd->closeit_date}}">               
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ผู้ปิดงาน</label>
                            <select class="form-control" name="closeit_save" id="closeit_save">
                                <option value="">กรุณาเลือก</option>
                                @foreach ($emp as $item)
                                   <option value="{{$item->employee_code}}" {{ old('closeit_save', $hd->closeit_save) == $item->employee_code ? 'selected' : null }}>
                                    {{$item->employee_fullname}} ({{$item->employee_code}})</option> 
                                @endforeach
                             </select>
                        </div>
                    </div>                   
                </div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label class="col-form-label">ผู้ใช้งาน</label>    
                            <select class="form-control" name="close_save" id="close_save">
                                <option value="">กรุณาเลือก</option>
                                @foreach ($emp as $item)
                                   <option value="{{$item->employee_code}}" {{ old('close_save', $hd->close_save) == $item->employee_code ? 'selected' : null }}>
                                    {{$item->employee_fullname}} ({{$item->employee_code}})</option> 
                                @endforeach
                             </select>                                              
                        </div>
                    </div>
                    <div class="col-12 col-md-9">
                        <div class="form-group">
                            <label class="col-form-label">ข้อคิดเห็น</label>
                            <input type="text" class="form-control" name="close_note" id="close_note" value="{{$hd->close_note}}">                           
                        </div>
                    </div>                   
                </div><hr>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
@endpush