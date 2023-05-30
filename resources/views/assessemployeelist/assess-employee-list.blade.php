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
                                    <th class="">รหัสพนักงาน</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>แผนก</th>
                                    <th>ตำแหน่ง</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hd as $item)
                                    <tr>
                                        <td>{{$item->employee_code}}</td>
                                        <td>{{$item->employee_fullname}}</td>
                                        <td>{{$item->department_name}}</td>
                                        <td>{{$item->employee_job}}</td>
                                        <td>
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