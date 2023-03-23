@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">รายงานตรวจสอบเวลา</h3>
            </div>
            <form method="GET" class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <input type="date" 
                        name="datestart" 
                        id="datestart" 
                        class="form-control"
                        value="{{$datestart}}">            
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="date" 
                        name="dateend" 
                        id="dateend" 
                        class="form-control"
                        value="{{$dateend}}">
                    </div>
                    <div class="col-12 col-md-3">
                        <button class="btn btn-info w-lg">
                            <i class="fas fa-search"></i> ค้นหา
                        </button>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>บริษัท</th>
                                    <th>พนักงาน</th>
                                    <th>วันที่</th>
                                    <th>เวลา</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                    <td style="text-align: center"><img class="img-thumbnail" alt="100x100" width="100" src="/assets/images/users/{{$item->employee_image}}"></td>
                                    <td>{{$item->emp_times_company}}</td>
                                    <td>{{$item->emp_times_empfullname}} ({{$item->emp_times_empcode}})</td>  
                                    <td>{{\Carbon\Carbon::parse($item->emp_times_date)->format('d/m/Y')}}</td>                                
                                    <td>{{$item->emp_times_result}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection