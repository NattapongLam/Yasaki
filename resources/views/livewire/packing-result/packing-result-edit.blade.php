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
        <h3 class="card-title">อัพเดทผลผลิตประจำวันแผนกแพ็คกิ้ง</h3>
        <form>       
        <div class="row">
            <div class="col-12 col-md-3">
                <label for="pkgresult_date" class="col-form-label">วันที่</label>
                <input type="date" class="form-control" name="pkgresult_date" id="pkgresult_date" onchange="getdataDate(this.value)" required>
                <p id="pkgresult_id"></p>
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_empfull" class="col-form-label">กำลังพลทั้งหมด</label>
                <p id="pkgresult_empfull"></p>
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_empqty" class="col-form-label">กำลังพลที่มา</label>
                <p id="pkgresult_empqty"></p>
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_empdel" class="col-form-label">กำลังพลที่ไม่มา</label>
                <p id="pkgresult_empdel"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <label for="pkgresult_absent" class="col-form-label">ขาดงาน</label>
                <p id="pkgresult_absent"></p>
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_leave" class="col-form-label">ลากิจ</label>
                <p id="pkgresult_leave"></p>
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_sick" class="col-form-label">ลาป่วย</label>
                <p id="pkgresult_sick"></p>
            </div>
            <div class="col-12 col-md-3">
                <label for="pkgresult_vacation" class="col-form-label">ลาพักร้อน</label>
                <p id="pkgresult_vacation"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3">
                <label for="pkgresult_maternity" class="col-form-label">ลาคลอด</label>
                <p id="pkgresult_maternity"></p>
            </div>
            <div class="col-12 col-md-9">
                <label for="pkgresult_remark" class="col-form-label">ปัญหา</label>
                <p id="pkgresult_remark"></p>
            </div>
        </div><hr>
        <div class="row">
            <table class="table table-bordered dt-responsive text-center" id="list_date">
                <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ประเภทแพ็ค</th>
                                    <th>สินค้า</th>
                                    <th>หน่วยนับ</th>
                                    <th>จำนวน</th>
                                    <th>หมายเหตุ</th>
                                </tr>
                </thead>
                <tbody id="list_datedt">                                     
                </tbody>
            </table>
        </div>
    </form><hr>
    <form>    
    <div class="row">
        <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-primary">เพิ่มรายการสินค้า</button>    
        </div>
        <div class="col-12 col-md-2">
            <label for="pkgresult_leave" class="col-form-label">ประเภทแพ็ค</label>
            <select name="pdtype" class="form-select">
                <option value="กล่อง">กล่อง</option>
                <option value="แพ็ค+สปริง">แพ็ค+สปริง</option>
            </select>
        </div>
        <div class="col-12 col-md-6">
            <label for="pkgresult_leave" class="col-form-label">สินค้า</label>
            <select name="product_id" id="prepend-text-single-field" class="form-select"> 
                @foreach ($pd as $item)
                    <option value="{{$item->id}}">{{$item->Code}}/{{$item->Name1}} ({{$item->UnitName}} )</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label for="pkgresult_leave" class="col-form-label">จำนวน</label>
            <input type="number" class="form-control" value="{{old('',0)}}">
        </div>       
    </div>
    </form>
    </div>
</div>
</div>
@endsection
@push('scriptjs')
<script>
$( '#prepend-text-single-field' ).select2( {
    theme: "bootstrap-5"
} );
  getdataDate = (id) =>{
    //console.log(id)
    $('#list_date').DataTable().destroy();
    $.ajax({
        url : "{{ url('/getDetailDate') }}",
        method : "POST",
        dataType : "json",
        data : {
            "_token": "{{ csrf_token() }}",
            id : id
        },
        success: function(data){
            $('#pkgresult_id').html(`<input type="hidden" class="form-control" id="pkgresult_id" name="pkgresult_id" value="${data.hd.id}">`)
            $('#pkgresult_empfull').html(`<input type="text" class="form-control" id="pkgresult_empfull" name="pkgresult_empfull" value="${data.hd.pkgresult_empfull}">`) 
            $('#pkgresult_empqty').html(`<input type="text" class="form-control" id="pkgresult_empqty" name="pkgresult_empqty" value="${data.hd.pkgresult_empqty}">`)   
            $('#pkgresult_empdel').html(`<input type="text" class="form-control" id="pkgresult_empdel" name="pkgresult_empdel" value="${data.hd.pkgresult_empdel}">`)    
            $('#pkgresult_absent').html(`<input type="text" class="form-control" id="pkgresult_absent" name="pkgresult_absent" value="${data.hd.pkgresult_absent}">`) 
            $('#pkgresult_leave').html(`<input type="text" class="form-control" id="pkgresult_leave" name="pkgresult_leave" value="${data.hd.pkgresult_leave}">`)   
            $('#pkgresult_sick').html(`<input type="text" class="form-control" id="pkgresult_sick" name="pkgresult_sick" value="${data.hd.pkgresult_sick}">`) 
            $('#pkgresult_vacation').html(`<input type="text" class="form-control" id="pkgresult_vacation" name="pkgresult_vacation" value="${data.hd.pkgresult_vacation}">`)
            $('#pkgresult_maternity').html(`<input type="text" class="form-control" id="pkgresult_maternity" name="pkgresult_maternity" value="${data.hd.pkgresult_maternity}">`)  
            $('#pkgresult_remark').html(`<input type="text" class="form-control" id="pkgresult_remark" name="pkgresult_remark" value="${data.hd.pkgresult_remark}">`)
            let el_tr = ''  
            $.each(data.dt , function(index,item){
            //console.log(data.dt)            
            el_tr += `<tr style="background-color:powderblue">
                <td>
                    ${ index + 1 }
                    <input type="hidden" name="dt_id[]" value="${item.id}" hidden>
                </td>
                <td>${item.pkgresult_pdtype}</td>
                <td>${item.pkgresult_pdcode}/${item.pkgresult_pdname}</td>
                <td>${item.pkgresult_pdunit}</td>
                <td>
                    <input type="number" class="form-control text-center" id="pkgresult_pdqty${item.id}"  name="pkgresult_pdqty[]" value="${parseFloat(item.pkgresult_pdqty).toFixed(0)}">
                </td>
                <td>
                    <input type="text" class="form-control text-center" id="pkgresult_note${item.id}"  name="pkgresult_note[]" value="${item.pkgresult_note}">
                </td>
            </tr>`})
            $('#list_datedt').html(el_tr)
        }
    })
}
</script>
@endpush