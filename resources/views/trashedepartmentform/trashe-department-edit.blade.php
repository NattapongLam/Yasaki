@extends('layouts.main')
@section('content')
<div class="row">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{ session('success') }}
        <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="mdi mdi-block-helper me-2"></i>
        {{ session('error') }}
        <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
<div class="card">
    <div class="card-body">
        <h3 class="card-title">บันทึกการนำของเสียออกนอกแผนก (YSK2-FM-EMS-18)</h3>
        <form method="POST" class="form-horizontal" action="{{ route('tras-dep.update',$tras->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <input class="form-control" name="department_name" id="department_name" value="{{$tras->department_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="month_name" class="col-form-label">เดือน</label>
                            <input class="form-control" name="month_name" id="month_name" value="{{$tras->month_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="year_name" class="col-form-label">ปี</label>
                            <input class="form-control" name="year_name" id="year_name" value="{{$tras->year_name}}" readonly>
                        </div>
                    </div>
            </div><hr>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered dt-responsive nowrap w-100 text-center">
                            <tbody>
                                @foreach ($dt as $key => $item)
                                <tr style="background-color:powderblue">
                                    <td>
                                        <label class="col-form-label">
                                        {{$item->tras_listno}}/{{$item->tras_name}}
                                        </label>
                                        <input type="hidden" value="{{$item->id}}" name="dt_id[]">
                                    </td>
                                    <td><label class="col-form-label">{{$item->tras_unit}}</label></td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">01 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty01"name="qty01[]" value="{{number_format($item->qty01,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">02 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty02"name="qty02[]" value="{{number_format($item->qty02,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">03 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty03"name="qty03[]" value="{{number_format($item->qty03,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">04 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty04"name="qty04[]" value="{{number_format($item->qty04,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">05 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty05"name="qty05[]" value="{{number_format($item->qty05,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">06 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty06"name="qty06[]" value="{{number_format($item->qty06,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">07 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty07"name="qty07[]" value="{{number_format($item->qty07,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">08 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty08"name="qty08[]" value="{{number_format($item->qty08,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">09 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty09"name="qty09[]" value="{{number_format($item->qty09,2)}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                   
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">10 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty10"name="qty10[]" value="{{number_format($item->qty10,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">11 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty11"name="qty11[]" value="{{number_format($item->qty11,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">12 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty12"name="qty12[]" value="{{number_format($item->qty12,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">13 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty13"name="qty13[]" value="{{number_format($item->qty13,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">14 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty14"name="qty14[]" value="{{number_format($item->qty14,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">15 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty15"name="qty15[]" value="{{number_format($item->qty15,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">16 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty16"name="qty16[]" value="{{number_format($item->qty16,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">17 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty17"name="qty17[]" value="{{number_format($item->qty17,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">18 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty18"name="qty18[]" value="{{number_format($item->qty18,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">19 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty19"name="qty19[]" value="{{number_format($item->qty19,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">20 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty20"name="qty20[]" value="{{number_format($item->qty20,2)}}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>                                                                   
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">21 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty21"name="qty21[]" value="{{number_format($item->qty21,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">22 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty22"name="qty22[]" value="{{number_format($item->qty22,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">23 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty23"name="qty23[]" value="{{number_format($item->qty23,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">24 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty24"name="qty24[]" value="{{number_format($item->qty24,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">25 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty25"name="qty25[]" value="{{number_format($item->qty25,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">26 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty26"name="qty26[]" value="{{number_format($item->qty26,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">27 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty27"name="qty27[]" value="{{number_format($item->qty27,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">28 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty28"name="qty28[]" value="{{number_format($item->qty28,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">29 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty29"name="qty29[]" value="{{number_format($item->qty29,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">30 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty30"name="qty30[]" value="{{number_format($item->qty30,2)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                        <label class="col-form-label">31 :</label>&nbsp;
                                        <input class="form-control" type="text" id="qty31"name="qty31[]" value="{{number_format($item->qty31,2)}}">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                   
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
            </div>
        </form>
    </div>
</div>
</div>
@endsection