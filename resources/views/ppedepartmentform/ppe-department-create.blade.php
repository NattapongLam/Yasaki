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
        <h3 class="card-title">แบบบันทึกการตรวจอุปกรณ์ป้องกันภัยส่วนบุคคล(PPE)</h3>
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
                                <th class="text-center">#</th>     
                                <th class="text-center">รหัสพนักงาน</th>                         
                                <th class="text-center">ชื่อ - นามสกุล</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>   
                        <tbody id="tb_productlist">
                        </tbody>       
                    </table>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-12 col-md-2">
                    <label for="safety_01" class="col-form-label">รองเท้าเซฟตี้</label>
                    <select class="form-control" name="safety_01" id="safety_01">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_02" class="col-form-label">ผ้าปิดจมูก</label>
                    <select class="form-control" name="safety_02" id="safety_02">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_03" class="col-form-label">ถุงมือหนัง</label>
                    <select class="form-control" name="safety_03" id="safety_03">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_04" class="col-form-label">หมวกกันฝุ่น</label>
                    <select class="form-control" name="safety_04" id="safety_04">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_05" class="col-form-label">เสื้อหน้าที่งาน(สะท้อนแสง)</label>
                    <select class="form-control" name="safety_05" id="safety_05">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_06" class="col-form-label">รองเท้าผ้าใบ</label>
                    <select class="form-control" name="safety_06" id="safety_06">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_07" class="col-form-label">ถุงมือผ้า</label>
                    <select class="form-control" name="safety_07" id="safety_07">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_08" class="col-form-label">ผ้ากันเปื้อน</label>
                    <select class="form-control" name="safety_08" id="safety_08">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_09" class="col-form-label">เสื้อแขนยาว</label>
                    <select class="form-control" name="safety_09" id="safety_09">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_10" class="col-form-label">แว่นตาเซฟตี้</label>
                    <select class="form-control" name="safety_10" id="safety_10">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_11" class="col-form-label">ถุงมือยาง</label>
                    <select class="form-control" name="safety_11" id="safety_11">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_12" class="col-form-label">หมวกเซฟตี้</label>
                    <select class="form-control" name="safety_12" id="safety_12">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <label for="safety_13" class="col-form-label">เอียปลั๊กอุดหู</label>
                    <select class="form-control" name="safety_13" id="safety_13">
                        <option value="0">X</option>
                        <option value="1">/</option>
                    </select>
                </div>
                <div class="col-12 col-md-10">
                    <label for="safety_other" class="col-form-label">อื่นๆ</label>
                    <input class="form-control" name="safety_other" id="safety_other">
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
                if (currentItemId.map(item => item.value).includes(data.emp.employee_fullname)) {
                } else {
                    $numbertd = $('#tb_productlist tr').length + 1;                     
                    $('#tb_productlist').append(`
                    <tr style="background-color:#F8F8FF" class="uptofirst-class${data.emp.employee_code}">                    
                        <td><input type="hidden"  name="emp_listno[]" value="${$numbertd}">${$numbertd}</td>   
                        <td>${data.emp.employee_code}</td>
                        <td><input type="hidden" class="list_product_id" name="emp_fullname[]" value="${data.emp.employee_fullname}">${data.emp.employee_fullname}</td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="removeTolist('${data.emp.employee_code}')"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    `)
                }
            }
        })
    }
    removeTolist = (e,classrow) => {
            // remove row classrow 
            $('.uptofirst-class'+classrow).remove();
        }
</script>