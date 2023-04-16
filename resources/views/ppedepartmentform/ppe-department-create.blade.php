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
        <h3 class="card-title">แบบบันทึกการตรวจอุปกรณ์ป้องกันภัยส่วนบุคคล(PPE) (YSK3-FM-SMS-11)</h3>
        <form method="POST" class="form-horizontal" action="{{ route('ppe-dep.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <select name="department_name" id="department_name" class="form-control @error('department_name') is-invalid @enderror" onchange="getDatalist(this.value)">                       
                                    <option value="">-- กรุณาเลือกแผนก --</option>
                                    @foreach ($dep as $item)
                                    <option value="{{$item->department_name}}">{{$item->department_name}}</option>
                                    @endforeach
                            </select>
                            @error('department_name')
                            <div id="department_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="month_name" class="col-form-label">เดือน</label>
                            <select name="month_name" id="month_name" class="form-control @error('month_name') is-invalid @enderror">                       
                                    <option value="">-- กรุณาเลือกเดือน --</option>
                                    @foreach ($mont as $item)
                                    <option value="{{$item->month_name}}">{{$item->month_name}}</option>
                                    @endforeach
                            </select>
                            @error('month_name')
                            <div id="month_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="year_name" class="col-form-label">ปี</label>
                            <select name="year_name" id="year_name" class="form-control @error('year_name') is-invalid @enderror">                       
                                    <option value="">-- กรุณาเลือกปี --</option>
                                    @foreach ($year as $item)
                                    <option value="{{$item->year_name}}">{{$item->year_name}}</option>
                                    @endforeach
                            </select>
                            @error('year_name')
                            <div id="year_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="job_desc" class="col-form-label">หน้างานที่ทำ</label>
                            <input class="form-control @error('year_name') is-invalid @enderror" name="job_desc" id="job_desc" type="text">
                        </div>
                    </div>
            </div>
            <div class="row">
                
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-6">
                    <h4 class="card-title">รายชื่อพนักงานทั้งหมด</h4>
                    <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered dt-responsive nowrap w-100 text-center">     
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center">รหัสพนักงาน</th>
                                    <th class="text-center">ชื่อ - นามสกุล</th>
                                </tr>
                            </thead>   
                            <tbody id="datalist">
                            </tbody>       
                        </table>
                    </div>
                </div>
                <div class="col-xl-6">
                    <h4 class="card-title">รายชื่อพนักงานที่ตรวจ</h4>
                    <table id="tb_job" class="table table-bordered dt-responsive nowrap w-100 text-center">     
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th class="text-center">รหัสพนักงาน</th>
                                <th class="text-center">ชื่อ - นามสกุล</th>
                            </tr>
                        </thead>   
                        <tbody id="tb_productlist">
                        </tbody>       
                    </table>
                </div>
            </div><hr>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
            </div>
        </form>
    </div>
</div>
</div>
@endsection
<script>
getDatalist = (id) => {
// console.log(id)
$('#tb_job').DataTable().destroy();
$('#productsel tbody').empty();

$.ajax({
    url: "{{ url('/getTypeDatalist') }}",
    type: "POST",
    data: {
        ref: id,
        _token: "{{ csrf_token() }}"
    },
    dataType: "json",
    success: function(data) {
        let tr = ''
        if (data.ref == 1) {
            $.each(data.dataset, function() {

                tr += `
        <tr>
            <td>    
            <img width="30px" src="{{ asset('assets/images/icon/hand.png') }}" onclick="addTolist('${this.id }')">
            </td>
            <td>${ this.employee_code }</td>
            <td>${ this.employee_fullname }</td>
        </tr>
        `

            })

        } else {

            $.each(data.dataset, function() {

                tr += `
        <tr>
            <td>    
            <img width="30px" src="{{ asset('assets/images/icon/hand.png') }}" onclick="addTolist('${this.id }')">
            </td>
            <td>${ this.employee_code }</td>
            <td>${ this.employee_fullname }</td>
        </tr>
        `

            })


        }



        $('#datalist').html(tr)

        setTimeout(function() {
            $('#tb_job').DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'print'
                ]
            })
        }, 500);




    }

})
}
addTolist = (id) => {
        // console.log(id)
        $.ajax({
            url: "{{ url('/getEmp') }}",
            type: "POST",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function(data) {
                let currentItemId = $('.list_product_id').toArray();
                if (currentItemId.map(item => item.value).includes(data.product.ms_product_id)) {

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
                        
                    $.each(data.checkPR, function(key, value) {

                    if(data.product.ms_product_code == value.ms_product_code){
                    sumpr.push(parseFloat(value.pur_purchaserequest_dt_qty))
                    }

                    });
                    $sumrequest = sumpr.map(Number).reduce((a, b) => a + b, 0);

                    $('#tb_productlist').append(`
                    <tr style="background-color:#F8F8FF" class="${data.product.ms_product_id}">                    
                        <td>${$numbertd}</td>   
                        <td><input type="hidden" class="list_product_id" name="product_id[]" value="${data.product.ms_product_id}">รหัส : ${data.product.ms_product_code}<br>ชื่อ : ${data.product.ms_product_name1}</td>
                        <td><input type="number" class="form-control" name="product_qty[]" value="1"></td>
                        <td> <select name="product_per[]" class="form-control" id="sel_per${data.product.ms_product_id}">
                                        ${sel_per}</select></td>
                        <td>${$sumrequest} ${data.product.ms_product_unit_name}</td>
                        <td>${data.product.ms_product_unit_name}</td>
                        <td><input type="date" class="form-control" name="duedate[]" value="{{ date('Y-m-d') }}"></td>
                        <td>${parseFloat(data.product.ms_product_min).toFixed(2)}</td>
                        <td>${parseFloat(data.product.ms_product_max).toFixed(2)}</td>
                        <td>${parseFloat(data.product.stcqty).toFixed(2)}</td>
                        <td> <select name="typescreen[]" class="form-control" id="sel_typescreen_${data.product.ms_product_id}">
                            <option value="0">ไม่มีประเภทพิมพ์</option>
                                        ${sel_typescreen}
                                        </select></td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeTolist('${data.product.ms_product_id}')"><i class="fas fa-trash"></i></button></td>
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
    removeTolist = (reftr) => {

$('.' + reftr).remove()

}
</script>