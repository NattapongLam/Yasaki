@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="pt-3">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div>
                                <div class="text-center">
                                    <div class="mb-4">
                                        <a href="javascript: void(0);" class="badge bg-light font-size-12">
                                            <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i> {{$sta->project_status_name}}
                                        </a>
                                    </div>
                                    <h4>{{$hd->project_hd_name}}</h4>
                                    <p class="text-muted mb-4"><i class="mdi mdi-calendar me-1"></i>{{\Carbon\Carbon::parse($hd->project_hd_date)->format('d/m/Y')}}</p>
                                </div>

                                <hr>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div>
                                                <p class="text-muted mb-2">ประเภท</p>
                                                <h5 class="font-size-15">{{$hd->project_hd_type}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="text-muted mb-2">วันที่เริ่ม - จบ</p>
                                                <h5 class="font-size-15">
                                                {{\Carbon\Carbon::parse($hd->project_hd_start)->format('d/m/Y')}}
                                                - 
                                                {{\Carbon\Carbon::parse($hd->project_hd_end)->format('d/m/Y')}}   
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mt-4 mt-sm-0">
                                                <p class="text-muted mb-2">ผู้ดูแล</p>
                                                <h5 class="font-size-15">{{$hd->project_hd_save}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="my-5">
                                    <img src="assets/images/small/img-2.jpg" alt="" class="img-thumbnail mx-auto d-block">
                                </div>
                                <div class="mt-4">
                                    <div class="text-muted font-size-14">                                                                         
                                        <blockquote class="p-4 border-light border rounded mb-4">
                                            <div class="d-flex">
                                                <div>
                                                    <p class="mb-0">{{$hd->project_hd_remark}}</p>
                                                </div>
                                            </div>
                                            
                                        </blockquote>
                                        <div class="mt-4">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <ul class="ps-4">
                                                                <li class="py-1">แผนก : {{$hd->project_hd_dep}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-6">
                                                        <div>
                                                            <ul class="ps-4">
                                                                <li class="py-1">งบประมาณ : {{number_format($hd->project_hd_budget,2)}}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <h5 class="font-size-15">รายละเอียด :</h5> 
                                          @foreach ($dt as $item)
                                          <div class="d-flex py-3">
                                            <div class="flex-grow-1">
                                                <h5 class="font-size-14 mb-1">{{$item->project_dt_remark}}<small class="text-muted float-end">{{\Carbon\Carbon::parse($item->project_dt_duedate)->format('d/m/Y')}} </small></h5>
                                                <p class="text-muted"></p>
                                                <div>
                                                    <a href="javascript: void(0);" class="text-success"><i class="mdi mdi-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            </div>
                                          @endforeach                                  
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
@push('scriptjs')
<script>    
</script>
@endpush