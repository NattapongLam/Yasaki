@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">แบบบันทึกการตรวจอุปกรณ์ป้องกันภัยส่วนบุคคล (PPE)</h3>
            </div>
            <div class="card-body">
                <table id="tb_job" class="table table-bordered dt-responsive nowrap w-100 text-center">     
                    <thead>
                        <th>
                            <tr>
                                <th>เดือน-ปี</th>
                                <th>แผนก</th>
                                <th>หน้างานที่ทำ</th>
                                <th>หัวหน้าแผนก</th>
                                <th>ผู้จัดการฝ่าย</th>
                                <th></th>
                            </tr>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($hd as $item)
                            <tr>
                                <td>{{$item->month_name}}-{{$item->year_name}}</td>
                                <td>{{$item->department_name}}</td>
                                <td>{{$item->job_desc}}</td>
                                <td>{{$item->personsave}}</td>
                                <td>{{$item->approvalsave}}</td>
                                <td class="text-center">
                                    <a href="{{route('ppe-dep.edit',$item->id)}}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>                                                                            
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>
            
</script>
@endpush           