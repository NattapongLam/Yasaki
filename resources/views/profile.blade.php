@extends('layouts.main')
@section('content')
<div class="card">
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
    <div class="card-body">
        <h3 class="card-title">เปลี่ยนรหัสผ่าน</h3>
        <form method="POST" class="form-horizontal" action="{{ route('profiles.update',$emp->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-md-4" style="text-align: center">
                    <img class="rounded-circle avatar-xl" alt="200x200" src="/images/employees/{{$emp->avatar}}" data-holder-rendered="true">
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                    <label for="name" class="col-form-label">ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$emp->name}}" readonly>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                    <label for="username" class="col-form-label">ชื่อผู้ใช้งาน</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{$emp->username}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4" >
                    <label for="password" class="col-form-label">รหัสผ่าน</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                    <label for="type" class="col-form-label">ประเภทผู้ใช้</label>
                    <input type="text" class="form-control" name="type" id="type" value="{{$emp->type}}" readonly>
                    </div>
                </div>
                <div class="col-12 col-md-4" >
                    <div class="form-group">
                        <label for="avatar" class="col-form-label">รูปภาพ</label>
                        <input class="form-control" type="file" id="avatar" name="avatar">
                    </div>
                </div>                                    
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                    <label for="password_confirmation" class="col-form-label">ยืนยันรหัสผ่าน</label>
                    <input id="password_confirmation" class="form-control"type="password"name="password_confirmation" required />
                    </div>
                </div>              
                <div class="col-12 col-md-4">  
                </div>               
            </div> <br>
            <div class="row">
                <div class="col-12 col-md-4">  
                </div>
                <div class="col-12 col-md-4">  
                </div>
                <div class="col-12 col-md-4" style="text-align: right">  
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>
                </div>                     
            </div>         
        </form>
    </div>      
</div>
@endsection