@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">กรุณากรอกข้อมูล</h4>
                <form method="POST" class="form-horizontal" action="{{ route('policy.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="pol_date" class="col-form-label">วันที่</label>
                            <input type="date" class="form-control @error('pol_date') is-invalid @enderror" id="pol_date" name="pol_date" value="{{ date('Y-m-d') }}">
                            @error('pol_date')
                            <div id="pol_date_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="pol_file" class="col-form-label">ไฟล์ประกาศ</label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile01"  name="pol_file"> 
                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                            </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" name="pol_status" id="pol_status">
                                <option value="1">ใช้งาน</option>
                                <option value="0">ยกเลิก</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label for="pol_name" class="col-form-label">ชื่อประกาศ</label>
                        <input type="text" class="form-control @error('pol_name') is-invalid @enderror" id="pol_name" name="pol_name">
                            @error('pol_name')
                            <div id="pol_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">บันทึก</button>
                    </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection