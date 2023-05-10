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
    <form method="POST" class="form-horizontal" action="{{ route('pkgresult.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <h3 class="card-title">บันทึกผลผลิตประจำวันแผนกแพ็คกิ้ง</h3>
        <div class="row">
            <div class="col-12 col-md-3">
                <label for="pkgresult_date" class="col-form-label">วันที่</label>
                <input type="date" class="form-control" name="pkgresult_date" id="pkgresult_date">
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_empfull" class="col-form-label">กำลังพลทั้งหมด</label>
                <input type="number" class="form-control" name="pkgresult_empfull" id="pkgresult_empfull" value="{{old('pkgresult_empfull',0)}}">
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_empqty" class="col-form-label">กำลังพลที่มา</label>
                <input type="number" class="form-control" name="pkgresult_empqty" id="pkgresult_empqty" value="{{old('pkgresult_empqty',0)}}">
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_empdel" class="col-form-label">กำลังพลที่ไม่มา</label>
                <input type="number" class="form-control" name="pkgresult_empdel" id="pkgresult_empdel" value="{{old('pkgresult_empdel',0)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <label for="pkgresult_absent" class="col-form-label">ขาดงาน</label>
                <input type="number" class="form-control" name="pkgresult_absent" id="pkgresult_absent" value="{{old('pkgresult_absent',0)}}">
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_leave" class="col-form-label">ลากิจ</label>
                <input type="number" class="form-control" name="pkgresult_leave" id="pkgresult_leave" value="{{old('pkgresult_leave',0)}}">
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_sick" class="col-form-label">ลาป่วย</label>
                <input type="number" class="form-control" name="pkgresult_sick" id="pkgresult_sick" value="{{old('pkgresult_sick',0)}}">
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_vacation" class="col-form-label">ลาพักร้อน</label>
                <input type="number" class="form-control" name="pkgresult_vacation" id="pkgresult_vacation" value="{{old('pkgresult_vacation',0)}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <label for="pkgresult_maternity" class="col-form-label">ลาคลอด</label>
                <input type="number" class="form-control" name="pkgresult_maternity" id="pkgresult_maternity" value="{{old('pkgresult_maternity',0)}}">
            </div>
            <div class="col-12 col-md-9">
                <label for="pkgresult_remark" class="col-form-label">ปัญหา</label>
                <input type="text" class="form-control" name="pkgresult_remark" id="pkgresult_remark" value="{{old('pkgresult_remark')}}">
            </div>
        </div>
        <hr>
        <div class="row">
            <h3 class="card-title">ตารางสินค้า</h3>
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr style="background-color:#F5F5F5">
                        <th class="text-center">ลำดับ</th>
                        <th class="text-center">ประเภทแพ็ค</th>
                        <th class="text-center">สินค้า</th>
                        <th class="text-center">หน่วยนับ</th>
                        <th class="text-center">จำนวน</th>
                        <th class="text-center">หมายเหตุ</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody id="tb_productlist">
                </tbody>
            </table>
            </div>
        </div><hr>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
        </div><hr>
        <div class="row">
            <div class="table-responsive">
                <table id="tb_job" class="table mb-0">
                    <thead>
                        <tr>
                            <th>เลือก</th>
                            <th>รูปภาพ</th>
                            <th>สินค้า</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pd as $item)
                            <tr>
                                <td><img width="30px" src="{{ asset('assets/images/icon/hand.png') }}" onclick="addTolist('{{ $item->id }}')"></td>
                                <td> <img class="img-thumbnail" alt="100x100" width="100" src="{{$item->PicFileName1}}" data-holder-rendered="true"></td>
                                <td>{{$item->Code}}/{{$item->Name1}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
@endsection
<script>
    addTolist = (id) => {
        // console.log(id)
        $.ajax({
            url: "{{ url('/getProduct') }}",
            type: "POST",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function(data) {
                console.log(data)
                let currentItemId = $('.list_product_id').toArray();
                if (currentItemId.map(item => item.value).includes(data.product.id)) {
                    toastr.error('มีสินค้านี้อยู่ในรายการแล้ว', 'Error', {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "showDuration": 500,
                        "hideDuration": 10,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    });

                } else {
                    $numbertd = $('#tb_productlist tr').length + 1;
                    $('#tb_productlist').append(`
                    <tr>
                        <td>${$numbertd}</td> 
                        <td>
                            <select name="pdtype[]" class="form-control" id="${data.product.id}">
                            <option value="กล่อง">กล่อง</option>
                            <option value="แพ็ค+สปริง">แพ็ค+สปริง</option>
                            </select> 
                        </td>
                        <td><input type="hidden" class="list_product_id" name="product_id[]" value="${data.product.id}">${data.product.Code}/${data.product.Name1}</td>
                        <td>${data.product.UnitName}</td>
                        <td>
                            <input type="number" class="form-control" name="pdqty[]" id="${data.product.id}" value="1">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="pdnote[]" id="${data.product.id}">
                        </td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeTolist(this)"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    `)
                    toastr.success('เพิ่มสินค้าเรียบร้อย', 'Success', {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "showDuration": 500,
                        "hideDuration": 10,
                        "timeOut": 5000,
                        "extendedTimeOut": 1000,
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    });
                }
            }
        })
    }
    removeTolist = (e) => {
        $(e).parent().parent().remove()
    }
</script>