@extends('layouts.main')
@section('content')
<link href="{{ asset('assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css')}}" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-xl-12">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">{{$hd->employee_company}}</h5>
                            <p>{{$hd->employee_code}}</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="/assets/images/users/{{$hd->employee_image}}" alt="" class="img-thumbnail rounded-circle">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{$hd->employee_fullname}}</h5>
                        <p class="text-muted mb-0 text-truncate">{{$hd->employee_job}}</p>
                    </div>
                    <div class="col-sm-8">
                        <div class="pt-4">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">{{$hd->employee_country}}</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">{{$hd->department_name}}</h5>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">SKILL UPDATE {{\Carbon\Carbon::parse($d->skill_emp_date)->format('d/m/Y')}}</h4>
                <div class="row">
                @foreach ($emp as $item)
                    <div class="col-12 col-md-4">
                        <div class="p-3">
                            <h5 class="font-size-14 mb-3">{{$item->skill_emp_listno}}.{{$item->skill_emp_name}}</h5>
                            <div class="progress">
                                @if ($item->skill_emp_qty == 25)
                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$item->skill_emp_qty}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{$item->skill_emp_qty}}%
                                </div>
                                @elseif($item->skill_emp_qty == 50)
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{$item->skill_emp_qty}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{$item->skill_emp_qty}}%
                                </div>
                                @elseif($item->skill_emp_qty == 75) 
                                <div class="progress-bar bg-info" role="progressbar" style="width: {{$item->skill_emp_qty}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{$item->skill_emp_qty}}%
                                </div>  
                                @elseif($item->skill_emp_qty == 100)   
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{$item->skill_emp_qty}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    {{$item->skill_emp_qty}}%
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>               
                @endforeach    
            </div>         
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">ประวัติการฝึกอบรม</h4>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>วิทยากร</th>
                                <th>หัวข้อ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tra as $item)
                                <tr>
                                    <td>
                                        {{\Carbon\Carbon::parse($item->trainingemp_datestart)->format('d/m/Y')}}
                                        - 
                                        {{\Carbon\Carbon::parse($item->trainingemp_dateend)->format('d/m/Y')}}
                                    </td>
                                    <td>{{$item->trainingemp_person}}</td>
                                    <td>{{$item->trainingemp_name}}</td>
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
<script src="{{ asset('assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/range-sliders.init.js')}}"></script>
@endpush