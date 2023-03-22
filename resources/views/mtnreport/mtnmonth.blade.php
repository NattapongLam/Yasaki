@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    <h3 class="card-title">รายงานการซ่อมเครื่องจักร - รายเดือน</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="GET" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-1">
                                        <label for="year" class="col-form-label">ปี</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select type="text" 
                                            name="year" 
                                            id="year" 
                                            class="form-control">
                                           <option value="">-- ปี --</option>                                      
                                            @for ($i = date('Y'); $i > date('Y')-10; $i--)
                                            <option value="{{$i}}" @if($year == $i) selected="selected" @endif>{{$i}}</option> 
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="dep" class="col-form-label">เลือกแผนก</label>
                                    </div>
                                    <div class="col-sm-2">
                                            <select type="text" 
                                            name="dep" 
                                            id="dep" 
                                            class="form-control">
                                           <option value="">-- แผนก --</option>                                      
                                            @foreach ($deplist as $item)
                                            <option value="{{$item->department_name}}"
                                                @if($item->department_name == $dep) selected="selected" @endif>
                                                {{$item->department_name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-info w-lg">
                                            <i class="fas fa-search"></i> ค้นหา
                                        </button>
                                    </div>                                  
                                </div><br>                              
                            </form>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center">เดือน</th>
                                    <th>แผนก</th>
                                    <th>เครื่องจักร</th>
                                    <th style="text-align: center">จำนวนครั้งที่หยุด</th>
                                    <th style="text-align: center">จำนวนชั่วโมงที่หยุด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $qty = 0;
                                    $hour = 0;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        {{-- <td style="text-align: center">{{Helper::monthThaiLong($item->Month)}}</td> --}}
                                        <td style="text-align: center">{{$item->Month}}</td>
                                        <td>{{$item->department_name}}</td>
                                        <td>{{$item->ms_machine_name}} ({{$item->ms_machine_code}})</td>
                                        <td style="text-align: center">{{number_format($item->Qty,2)}}</td>
                                        <td style="text-align: center">{{number_format($item->Hour,2)}}</td>
                                    </tr>
                                @php
                                    $qty += $item->Qty;
                                    $hour += $item->Hour;
                                    $months .="'".Helper::monthThaiLong($item->Month)."'";
                                    $dataBar .=$qty;
                                @endphp
                                @if(!$loop->last)
                                    @php
                                        $months .=",";
                                        $dataBar .= ","
                                    @endphp
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">ยอดรวม</td>
                                    <td style="text-align: center">{{number_format($qty,2)}}</td>
                                    <td style="text-align: center">{{number_format($hour,2)}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><hr>
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scriptjs')
<script src="{{URL::asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{URL::asset('assets/js/pages/chartjs.init.js')}}"></script> 
<script>
    var barChartData = {
        labels : [{!! $months !!}],
        datasets: [
            {
                label : 'จำนวนครั้ง',
                backgroundColor : 'rgba(60,141,188,0.9)',
                borderColor : 'rgba(60,141,188,0.8)',
                pointRadius : false,
                pointColor : "#3b8bba",
                pointStrokeColor : "rgba(60,141,188,1)",
                pointHightlightFill : '#fff',
                pointHightlightStroke : 'rgba(60,141,188,1)',
                data : [{!! $dataBar !!}]
            }
        ]
    }

    var barChartCanvas = $("#barChart").get(0).getContext('2d');
    var barChartData = $.extend(true,{},barChartData)
    var temp0 = barChartData.datasets[0]

    var barChartOptions = {
        responsive : true,
        maintainAspectRatio : false,
        datasetFill : false
    }

    new Chart(barChartCanvas,{
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })
</script>
@endpush