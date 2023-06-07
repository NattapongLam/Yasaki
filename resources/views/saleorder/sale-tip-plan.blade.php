@extends('layouts.main')
@section('content')
<div class="row">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="col-xl-5">
        <div class="card">      
            <div class="card-body">
                <h3 class="card-title">สร้างแผน</h3>    
                <form method="POST" class="form-horizontal" action="{{ route('sale-tip.store') }}" enctype="multipart/form-data"> 
                @csrf          
                <div class="row">                     
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tip_date" class="col-form-label">วันที่พบลูกค้า</label>
                            <input type="date" class="form-control @error('tip_date') is-invalid @enderror" name="tip_date" id="tip_date" value="{{date('Y-m-d')}}">                  
                            @error('tip_date')
                            <div id="tip_date" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tip_type" class="col-form-label">ประเภทพบลูกค้า</label>
                            <select class="form-control @error('tip_date') is-invalid @enderror" name="tip_type" id="tip_type" autofocus required>
                                <option value="">กรุณาเลือก</option>
                                <option value="การโทร">การโทร</option>
                                <option value="เข้าพบด้วยตัวเอง">เข้าพบด้วยตัวเอง</option>
                            </select>
                            @error('tip_type')
                            <div id="tip_type" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="cust_id" class="col-form-label">ลูกค้า</label>
                            <select class="form-control select2 @error('cust_id') is-invalid @enderror" name="cust_id" id="cust_id" autofocus required>
                                <option value="">กรุณาเลือก</option>
                                @foreach ($cust as $item)
                                    <option value="{{$item->id}}">{{$item->cust_name}}</option>
                                @endforeach
                            </select>
                            @error('cust_id')
                            <div id="cust_id" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <label for="tip_remark" class="col-form-label">หมายเหตุ</label>
                        <input class="form-control" name="tip_remark" id="tip_remark">
                    </div>               
                </div><br>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">บันทึกข้อมูล</button>    
                </div> 
            </form>                                
            </div>
        </div>
    </div>
    <div class="col-xl-7">
        <div class="card">      
            <div class="card-body">
                <h3 class="card-title">แผนพบลูกค้าในเดือน</h3>   
                <div class="row">
                    <div class="table-responsive">
                        <div style="overflow-x:auto;">
                            <table class="table md-0">
                                <thead>
                                    <tr>
                                       <th class="text-center">วันที่พบลูกค้า</th>
                                       <th class="text-center">ประเภทพบลูกค้า</th>
                                       <th class="text-center">ลูกค้า</th>
                                       <th class="text-center">อัพเดต</th>
                                       <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tip as $item)
                                        <tr>
                                            <td class="text-center">{{\Carbon\Carbon::parse($item->tip_date)->format('d/m/Y')}}</td>
                                            <td class="text-center">{{$item->tip_type}}</td>
                                            <td>{{$item->cust_name}}</td>
                                            <td class="text-center">
                                                @if ($item->tip_action == false)
                                                <a href="{{route('sale-tip.edit',$item->id)}}"class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                @else
                                                <span class="badge bg-success">ดำเนินการเรียบร้อย</span> 
                                                @endif                                   
                                            </td>
                                            <td class="text-center">
                                                @if ($item->tip_action == false)
                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelTip('{{ $item->id }}')"><i class="fas fa-trash"></i></a>
                                                @endif   
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                   
                </div>      
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>
$(document).ready(function() {
    $('.select2').select2({
        closeOnSelect: true
    });
});
confirmDelTip = (refid) =>{
console.log(refid);
Swal.fire({
    title: 'คุณแน่ใจหรือไม่ !',
    text: `คุณต้องการลบรายการนี้หรือไม่ ?`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'ยืนยัน',
    cancelButtonText: 'ยกเลิก',
    confirmButtonClass: 'btn btn-success mt-2',
    cancelButtonClass: 'btn btn-danger ms-2 mt-2',
    buttonsStyling: false
}).then(function(result) {
    if (result.value) {

        $.ajax({
            url: `{{ url('/confirmDelTip') }}`,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "refid": refid,
            },
            dataType: "json",
            success: function(data) {

                if (data.status == true) {
                    Swal.fire({
                        title: 'สำเร็จ',
                        text: 'ยกเลิกเอกสารเรียบร้อยแล้ว',
                        icon: 'success'
                    }).then(function() {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'ไม่สำเร็จ',
                        text: 'ยกเลิกเอกสารไม่สำเร็จ',
                        icon: 'error'
                    });
                }
               
            }
        });

    } else if ( // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire({
            title: 'ยกเลิก',
            text: 'โปรดตรวจสอบข้อมูลอีกครั้งเพื่อความถูกต้อง :)',
            icon: 'error'
        });
    }
});
}
</script>
@endpush