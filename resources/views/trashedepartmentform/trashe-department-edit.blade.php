@extends('layouts.main')
@section('content')
<link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
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
        <h3 class="card-title">บันทึกการนำของเสียออกนอกแผนก</h3>
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
                        <div style="overflow-x:auto;">
                            <table id="tb_tra" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">รายละเอียด</th>
                                        <th class="text-center">01</th>
                                        <th class="text-center">02</th>
                                        <th class="text-center">03</th>
                                        <th class="text-center">04</th>
                                        <th class="text-center">05</th>
                                        <th class="text-center">06</th>
                                        <th class="text-center">07</th>
                                        <th class="text-center">08</th>
                                        <th class="text-center">09</th>
                                        <th class="text-center">10</th>
                                        <th class="text-center">11</th>
                                        <th class="text-center">12</th>
                                        <th class="text-center">13</th>
                                        <th class="text-center">14</th>
                                        <th class="text-center">15</th>
                                        <th class="text-center">16</th>
                                        <th class="text-center">17</th>
                                        <th class="text-center">18</th>
                                        <th class="text-center">19</th>
                                        <th class="text-center">20</th>
                                        <th class="text-center">21</th>
                                        <th class="text-center">22</th>
                                        <th class="text-center">23</th>
                                        <th class="text-center">24</th>
                                        <th class="text-center">25</th>
                                        <th class="text-center">26</th>
                                        <th class="text-center">27</th>
                                        <th class="text-center">28</th>
                                        <th class="text-center">29</th>
                                        <th class="text-center">30</th>
                                        <th class="text-center">31</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($dt as $key => $item)
                                <tr>
                                    <td>
                                        <label class="col-form-label" style="width: 150px">
                                        {{$item->tras_listno}}/{{$item->tras_name}} ({{$item->tras_unit}})
                                        </label>
                                        <input type="hidden" value="{{$item->id}}" name="dt_id[]">
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty01"name="qty01[]" value="{{number_format($item->qty01,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty02"name="qty02[]" value="{{number_format($item->qty02,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty03"name="qty03[]" value="{{number_format($item->qty03,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty04"name="qty04[]" value="{{number_format($item->qty04,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty05"name="qty05[]" value="{{number_format($item->qty05,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty06"name="qty06[]" value="{{number_format($item->qty06,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty07"name="qty07[]" value="{{number_format($item->qty07,2)}}" style="width: 70px">
                                        </div>
                                    </td>                                  
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty08"name="qty08[]" value="{{number_format($item->qty08,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty09"name="qty09[]" value="{{number_format($item->qty09,2)}}" style="width: 70px">
                                        </div>
                                    </td>                                   
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty10"name="qty10[]" value="{{number_format($item->qty10,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty11"name="qty11[]" value="{{number_format($item->qty11,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty12"name="qty12[]" value="{{number_format($item->qty12,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty13"name="qty13[]" value="{{number_format($item->qty13,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty14"name="qty14[]" value="{{number_format($item->qty14,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty15"name="qty15[]" value="{{number_format($item->qty15,2)}}" style="width: 70px">
                                        </div>
                                    </td>                                                                
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty16"name="qty16[]" value="{{number_format($item->qty16,2)}}" style="width: 70px">
                                        </div>
                                    </td>        
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty17"name="qty17[]" value="{{number_format($item->qty17,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty18"name="qty18[]" value="{{number_format($item->qty18,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty19"name="qty19[]" value="{{number_format($item->qty19,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty20"name="qty20[]" value="{{number_format($item->qty20,2)}}" style="width: 70px">
                                        </div>
                                    </td>                                                               
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty21"name="qty21[]" value="{{number_format($item->qty21,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty22"name="qty22[]" value="{{number_format($item->qty22,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty23"name="qty23[]" value="{{number_format($item->qty23,2)}}" style="width: 70px">
                                        </div>
                                    </td>                                  
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty24"name="qty24[]" value="{{number_format($item->qty24,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty25"name="qty25[]" value="{{number_format($item->qty25,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty26"name="qty26[]" value="{{number_format($item->qty26,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty27"name="qty27[]" value="{{number_format($item->qty27,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty28"name="qty28[]" value="{{number_format($item->qty28,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty29"name="qty29[]" value="{{number_format($item->qty29,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" id="qty30"name="qty30[]" value="{{number_format($item->qty30,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                        <input class="form-control" type="text" id="qty31"name="qty31[]" value="{{number_format($item->qty31,2)}}" style="width: 70px">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
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
@push('scriptjs')
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script>
$(document).ready(function() {
    $('#tb_tra').DataTable({                   
        "autoWidth": false,
        "pageLength": 20,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],       
        dom: 'Bfrtip',
        width: '200%',
        height: 'auto',
        colHeaders: true,
        rowHeaders: true,
        colWidths: [1000, 
        1000, 1000, 1000, 1000, 1000 ,1000, 1000, 1000, 1000, 1000,
        1000, 1000, 1000, 1000, 1000 ,1000, 1000, 1000, 1000, 1000,
        1000, 1000, 1000, 1000, 1000 ,1000, 1000, 1000, 1000, 1000,
        1000],
        manualColumnResize: true,
        licenseKey: 'non-commercial-and-evaluation',
        buttons: [
            'copy','excel',
        ],  
        "order": [ 1, "asc" ],
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            left: 1,
        }
    })
});
</script>
@endpush