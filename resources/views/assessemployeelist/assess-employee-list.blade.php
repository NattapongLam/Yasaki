@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    <h3 class="card-title">แบบประเมินประจำปี</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">รูปภาพ</th>
                                    <th class="text-center">รหัสพนักงาน</th>
                                    <th class="text-center">ชื่อ - นามสกุล</th>
                                    <th class="text-center">แผนก</th>
                                    <th class="text-center">ตำแหน่ง</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hd as $item)
                                    <tr>
                                        <td style="text-align: center"><img class="img-thumbnail" alt="100x100" width="100" src="/assets/images/users/{{$item->employee_image}}"></td>
                                        <td class="text-center">{{$item->employee_code}}</td>
                                        <td class="text-center">{{$item->employee_fullname}}</td>
                                        <td class="text-center">{{$item->department_name}}</td>
                                        <td class="text-center">{{$item->employee_job}}</td>
                                        <td class="text-center">
                                            <a href="{{route('ass-emp.edit',$item->id)}}"
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
    </div>
@endsection