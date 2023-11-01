@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">เริ่มดำเนินการ</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach ($hd1 as $item)
                            <tr>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-warning font-size-14">ประเภท : {{$item->project_hd_type}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-warning font-size-14">ชื่อ : {{$item->project_hd_name}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-warning font-size-14">
                                        ระยะเวลา :
                                        {{\Carbon\Carbon::parse($item->project_hd_start)->format('d/m/Y')}}
                                        - 
                                        {{\Carbon\Carbon::parse($item->project_hd_end)->format('d/m/Y')}}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-warning font-size-14">เป้าหมาย : {{$item->project_hd_remark}}</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge rounded-pill badge-soft-warning font-size-14">ผู้ดูแล : {{$item->project_hd_save}}</span>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{route('project.show',$item->project_hd_id)}}" class="btn btn-soft-primary waves-effect waves-light"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">ดำเนินการเสร็จสิ้น</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach ($hd2 as $item)
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ประเภท :
                                            {{$item->project_hd_type}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ชื่อ : {{$item->project_hd_name}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ระยะเวลา :
                                        {{\Carbon\Carbon::parse($item->project_hd_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item->project_hd_end)->format('d/m/Y')}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">เป้าหมาย :
                                            {{$item->project_hd_remark}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ผู้ดูแล :
                                            {{$item->project_hd_save}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-soft-primary waves-effect waves-light"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">หยุดดำเนินการ</h4>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            @foreach ($hd3 as $item)
                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ประเภท :
                                            {{$item->project_hd_type}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ชื่อ : {{$item->project_hd_name}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ระยะเวลา :
                                        {{\Carbon\Carbon::parse($item->project_hd_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item->project_hd_end)->format('d/m/Y')}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">เป้าหมาย :
                                            {{$item->project_hd_remark}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0">
                                        <a href="javascript: void(0);" class="text-dark">ผู้ดูแล :
                                            {{$item->project_hd_save}}
                                        </a>
                                    </h5>
                                </td>
                                <td>
                                    <a class="btn btn-soft-primary waves-effect waves-light"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection
@push('scriptjs')
<script>    
</script>
@endpush