@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Skill Matrix {{$dep->department_name}}</h4>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">รูปภาพ</th>
                            <th>รหัสพนักงาน</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>บริษัท</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hd as $item)
                            <tr>
                                <td class="text-center"><img class="img-thumbnail" alt="100x100" width="100" src="/assets/images/users/{{$item->employee_image}}" data-holder-rendered="true"></td>
                                <td>{{$item->employee_code}}</td>
                                <td>{{$item->employee_fullname}}</td>
                                <td>{{$item->employee_company}}</td>
                                <td class="text-center">
                                    <a href="{{route('skill.edit',$item->employee_code)}}" 
                                        class="btn btn-soft-info waves-effect waves-light" 
                                        target=”_blank”><i class="fas fa-eye"></i></a>
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
@push('scriptjs')
@endpush