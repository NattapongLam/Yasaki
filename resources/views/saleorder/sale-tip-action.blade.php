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
    <div class="col-xl-12">
        <div class="card">      
            <div class="card-body">
                <h3 class="card-title">อัพเดตแผน</h3>    
                <form method="POST" class="form-horizontal" action="{{ route('sale-tip.update',$tip->id) }}" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')       
                <div class="row">                     
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="tip_date" class="col-form-label">วันที่พบลูกค้า</label>
                            <input type="date" class="form-control" name="tip_date" id="tip_date" value="{{$tip->tip_date}}" readonly>                  
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
                            <select class="form-control" name="tip_type" id="tip_type" autofocus required>
                                @if($tip->tip_type == "การโทร")
                                <option value="การโทร">การโทร</option>
                                <option value="เข้าพบด้วยตัวเอง">เข้าพบด้วยตัวเอง</option>
                                @else                               
                                <option value="เข้าพบด้วยตัวเอง">เข้าพบด้วยตัวเอง</option>
                                <option value="การโทร">การโทร</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="cust_id" class="col-form-label">ลูกค้า</label>
                            <input class="form-control" value="{{$tip->cust_name}}" readonly>

                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <label for="tip_remark" class="col-form-label">หมายเหตุ</label>
                        <input class="form-control" name="tip_remark" id="tip_remark" value="{{$tip->tip_remark}}">
                    </div>               
                </div><br>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-md waves-effect waves-light">บันทึกข้อมูล</button>    
                </div> 
            </form>                                
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>

</script>
@endpush