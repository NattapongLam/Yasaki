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
        <form method="POST" class="form-horizontal" action="{{ route('tras-dep.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <select name="department_name" id="department_name" class="form-control @error('department_name') is-invalid @enderror">                       
                                    <option value="">-- กรุณาเลือกแผนก --</option>
                                    @foreach ($dep as $item)
                                    <option value="{{$item->department_name}}">{{$item->department_name}}</option>
                                    @endforeach
                            </select>
                            @error('department_name')
                            <div id="department_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="month_name" class="col-form-label">เดือน</label>
                            <select name="month_name" id="month_name" class="form-control @error('month_name') is-invalid @enderror">                       
                                    <option value="">-- กรุณาเลือกเดือน --</option>
                                    @foreach ($mont as $item)
                                    <option value="{{$item->month_name}}">{{$item->month_name}}</option>
                                    @endforeach
                            </select>
                            @error('month_name')
                            <div id="month_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="year_name" class="col-form-label">ปี</label>
                            <select name="year_name" id="year_name" class="form-control @error('year_name') is-invalid @enderror">                       
                                    <option value="">-- กรุณาเลือกปี --</option>
                                    @foreach ($year as $item)
                                    <option value="{{$item->year_name}}">{{$item->year_name}}</option>
                                    @endforeach
                            </select>
                            @error('year_name')
                            <div id="year_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
            </div><hr>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered dt-responsive nowrap w-100 text-center">
                            {{-- <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ประเภทขยะ</th>
                                    <th>หน่วยนับ</th>
                                    <th>01</th>
                                    <th>02</th>
                                    <th>03</th>
                                    <th>04</th>
                                    <th>05</th>
                                    <th>06</th>
                                    <th>07</th>
                                    <th>08</th>
                                    <th>09</th>
                                    <th>10</th>
                                    <th>11</th>
                                    <th>12</th>
                                    <th>13</th>
                                    <th>14</th>
                                    <th>15</th>
                                    <th>16</th>
                                    <th>17</th>
                                    <th>18</th>
                                    <th>19</th>
                                    <th>20</th>
                                    <th>21</th>
                                    <th>22</th>
                                    <th>23</th>
                                    <th>24</th>
                                    <th>25</th>
                                    <th>26</th>
                                    <th>27</th>
                                    <th>28</th>
                                    <th>29</th>
                                    <th>30</th>
                                    <th>31</th>
                                </tr>
                            </thead> --}}
                            <tbody>
                                @foreach ($tras as $key => $item)
                                <tr style="background-color:powderblue">
                                    <td>
                                        <label class="col-form-label">
                                        {{$item->tras_listno}}/{{$item->tras_name}} ({{$item->tras_unit}})
                                        </label>
                                        <input type="hidden" value="{{$item->id}}" name="tras_id[]">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">01 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty01"name="qty01[]" value="{{old('qty01',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">02 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty02"name="qty02[]" value="{{old('qty02',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">03 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty03"name="qty03[]" value="{{old('qty03',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">04 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty04"name="qty04[]" value="{{old('qty04',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">05 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty05"name="qty05[]" value="{{old('qty05',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">06 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty06"name="qty06[]" value="{{old('qty06',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">07 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty07"name="qty07[]" value="{{old('qty07',0)}}">
                                        </div>
                                    </td>                                  
                                </tr>
                                <tr> 
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">08 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty08"name="qty08[]" value="{{old('qty08',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">09 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty09"name="qty09[]" value="{{old('qty09',0)}}">
                                        </div>
                                    </td>                                  
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">10 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty10"name="qty10[]" value="{{old('qty10',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">11 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty11"name="qty11[]" value="{{old('qty11',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">12 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty12"name="qty12[]" value="{{old('qty12',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">13 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty13"name="qty13[]" value="{{old('qty13',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">14 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty14"name="qty14[]" value="{{old('qty14',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">15 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty15"name="qty15[]" value="{{old('qty15',0)}}">
                                        </div>
                                    </td>                                   
                                </tr>
                                <tr> 
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">16 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty16"name="qty16[]" value="{{old('qty16',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">17 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty17"name="qty17[]" value="{{old('qty17',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">18 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty18"name="qty18[]" value="{{old('qty18',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">19 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty19"name="qty19[]" value="{{old('qty19',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">20 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty20"name="qty20[]" value="{{old('qty20',0)}}">
                                        </div>
                                    </td>                                                                  
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">21 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty21"name="qty21[]" value="{{old('qty21',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">22 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty22"name="qty22[]" value="{{old('qty22',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">23 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty23"name="qty23[]" value="{{old('qty23',0)}}">
                                        </div>
                                    </td>                                
                                </tr>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">24 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty24"name="qty24[]" value="{{old('qty24',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">25 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty25"name="qty25[]" value="{{old('qty25',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">26 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty26"name="qty26[]" value="{{old('qty26',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">27 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty27"name="qty27[]" value="{{old('qty27',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">28 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty28"name="qty28[]" value="{{old('qty28',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">29 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty29"name="qty29[]" value="{{old('qty29',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <label class="col-form-label">30 :</label>&nbsp;
                                            <input class="form-control" type="text" id="qty30"name="qty30[]" value="{{old('qty30',0)}}">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                        <label class="col-form-label">31 :</label>&nbsp;
                                        <input class="form-control" type="text" id="qty31"name="qty31[]" value="{{old('qty31',0)}}">
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