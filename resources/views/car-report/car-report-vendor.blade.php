@extends('layouts.main')
@section('content')
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
<div class="card">
    <div class="card-body">
        <h3 class="card-title">ตอบกลับใบร้องขอให้มีการแก้ไขและป้อง (CAR)</h3>
        <div class="row">
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label class="col-form-label">วันที่</label>
                    <input class="form-control" value="{{$hd->car_report_date}}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label class="col-form-label">เลขที่</label>
                    <input class="form-control" value="{{$hd->car_report_docuno}}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label class="col-form-label">ผู้รายการ</label>
                    <input class="form-control" value="{{$hd->car_report_save}}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label class="col-form-label">ประเภท</label>
                    <input class="form-control" value="{{$hd->car_report_severe}}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label class="col-form-label">เรื่องที่เกี่ยวข้อง</label>
                    <input class="form-control" value="{{$hd->car_report_process}}" readonly>
                </div>
            </div>
            <div class="col-12 col-md-2">
                <div class="form-group">
                    <label class="col-form-label">รายการปัญหา</label>
                    <input class="form-control" value="{{$hd->ref_cause}}" readonly>
                </div>
            </div>           
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label">รายละเอียดข้อพกพร่องที่พบ</label>
                    <textarea class="form-control" rows="5" readonly>{{$hd->car_report_remark}}</textarea>
                </div>
            </div>
        </div><hr>
        <div class="row">
            <div class="col-12 col-md-6">
                <img class="img-thumbnail" src="{{ asset($hd->car_report_webpic1)}}">
            </div>
            <div class="col-12 col-md-6">
                <img class="img-thumbnail" src="{{ asset($hd->car_report_webpic2)}}">
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">กรุณาตอบ</h3>
        <form method="POST" class="form-horizontal" action="{{ route('car.update',$hd->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label">สาเหตุของข้อพกพร่อง</label>
                    <textarea class="form-control" rows="5" name="car_report_cause" id="car_report_cause"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label">การแก้ไขปัญหาเพื่อกำจัดสาเหตุของปัญหา</label>
                    <textarea class="form-control" rows="5" name="car_report_correct" id="car_report_correct"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label class="col-form-label">การป้องกันไม่ให้ปัญหาเกิดซ้ำ</label>
                    <textarea class="form-control" rows="5" name="car_report_prevent" id="car_report_prevent"></textarea>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">วันที่จะแล้วเสร็จ</label>
                    <input class="form-control" type="date" name="persondate" id="persondate">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">ลงชื่อ</label>
                    <input class="form-control" type="text" name="person_web" id="person_web">
                </div>
            </div>          
        </div><br>
        <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
        </form>
    </div>
</div>
</div>
@endsection