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
            <h3 class="card-title">แบบบันทึกการตรวจอุปกรณ์ป้องกันภัยส่วนบุคคล(PPE)</h3>
            <form method="POST" class="form-horizontal" action="{{ route('ppe-dep.update',$hd->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <input class="form-control" value="{{$hd->department_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="month_name" class="col-form-label">เดือน</label>
                            <input class="form-control" value="{{$hd->month_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="year_name" class="col-form-label">ปี</label>
                            <input class="form-control" value="{{$hd->year_name}}" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="job_desc" class="col-form-label">หน้างานที่ทำ</label>
                            <input class="form-control" value="{{$hd->job_desc}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <label for="safety_01" class="col-form-label">รองเท้าเซฟตี้</label>                       
                        <select class="form-control" name="safety_01" id="safety_01">
                            @if($hd->safety_01 == true)
                            <option value="{{$hd->safety_01}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_01}}">X</option>
                            <option value="1">/</option>
                            @endif                           
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_02" class="col-form-label">ผ้าปิดจมูก</label>
                        <select class="form-control" name="safety_02" id="safety_02">
                            @if($hd->safety_02 == true)
                            <option value="{{$hd->safety_02}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_02}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_03" class="col-form-label">ถุงมือหนัง</label>
                        <select class="form-control" name="safety_03" id="safety_03">
                            @if($hd->safety_03 == true)
                            <option value="{{$hd->safety_03}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_03}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_04" class="col-form-label">หมวกกันฝุ่น</label>
                        <select class="form-control" name="safety_04" id="safety_04">
                            @if($hd->safety_04 == true)
                            <option value="{{$hd->safety_04}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_04}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_05" class="col-form-label">เสื้อหน้าที่งาน(สะท้อนแสง)</label>
                        <select class="form-control" name="safety_05" id="safety_05">
                            @if($hd->safety_05 == true)
                            <option value="{{$hd->safety_05}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_05}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_06" class="col-form-label">รองเท้าผ้าใบ</label>
                        <select class="form-control" name="safety_06" id="safety_06">
                            @if($hd->safety_06 == true)
                            <option value="{{$hd->safety_06}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_06}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_07" class="col-form-label">ถุงมือผ้า</label>
                        <select class="form-control" name="safety_07" id="safety_07">
                            @if($hd->safety_07 == true)
                            <option value="{{$hd->safety_07}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_07}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_08" class="col-form-label">ผ้ากันเปื้อน</label>
                        <select class="form-control" name="safety_08" id="safety_08">
                            @if($hd->safety_08 == true)
                            <option value="{{$hd->safety_08}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_08}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_09" class="col-form-label">เสื้อแขนยาว</label>
                        <select class="form-control" name="safety_09" id="safety_09">
                            @if($hd->safety_09 == true)
                            <option value="{{$hd->safety_09}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_09}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_10" class="col-form-label">แว่นตาเซฟตี้</label>
                        <select class="form-control" name="safety_10" id="safety_10">
                            @if($hd->safety_10 == true)
                            <option value="{{$hd->safety_10}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_10}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_11" class="col-form-label">ถุงมือยาง</label>
                        <select class="form-control" name="safety_11" id="safety_11">
                            @if($hd->safety_11 == true)
                            <option value="{{$hd->safety_11}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_11}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_12" class="col-form-label">หมวกเซฟตี้</label>
                        <select class="form-control" name="safety_12" id="safety_12">
                            @if($hd->safety_12 == true)
                            <option value="{{$hd->safety_12}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_12}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="safety_13" class="col-form-label">เอียปลั๊กอุดหู</label>
                        <select class="form-control" name="safety_13" id="safety_13">
                            @if($hd->safety_13 == true)
                            <option value="{{$hd->safety_13}}">/</option>
                            <option value="0">X</option>
                            @else
                            <option value="{{$hd->safety_13}}">X</option>
                            <option value="1">/</option>
                            @endif     
                        </select>
                    </div>
                    <div class="col-12 col-md-10">
                        <label for="safety_other" class="col-form-label">อื่นๆ</label>
                        <input class="form-control" name="safety_other" id="safety_other" value="{{$hd->safety_other}}">
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive-xxl">
                        <div style="overflow-x:auto;">
                            <table id="tb_ppe" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">พนักงาน</th>
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
                                        <td style="width: 600px">
                                            <label class="col-form-label" style="width: 200px">
                                            {{$item->emp_listno}}/{{$item->emp_fullname}}
                                            </label>
                                            <input type="hidden" value="{{$item->id}}" name="dt_id[]">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action1[]" style="width: 50px">
                                                @if($item->action1 == true)
                                                <option value="{{$item->action1}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action1}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action2[]" style="width: 50px">
                                                @if($item->action2 == true)
                                                <option value="{{$item->action2}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action2}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action3[]" style="width: 50px">
                                                @if($item->action3 == true)
                                                <option value="{{$item->action3}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action3}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                                                                       
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action4[]" style="width: 50px">
                                                @if($item->action4 == true)
                                                <option value="{{$item->action4}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action4}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>     
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action5[]" style="width: 50px">
                                                @if($item->action5 == true)
                                                <option value="{{$item->action5}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action5}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>    
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action6[]" style="width: 50px">
                                                @if($item->action6 == true)
                                                <option value="{{$item->action6}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action6}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action7[]" style="width: 50px">
                                                @if($item->action7 == true)
                                                <option value="{{$item->action7}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action7}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action8[]" style="width: 50px">
                                                @if($item->action8 == true)
                                                <option value="{{$item->action8}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action8}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                                    
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action9[]" style="width: 50px">
                                                @if($item->action9 == true)
                                                <option value="{{$item->action9}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action9}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action10[]" style="width: 50px">
                                                @if($item->action10 == true)
                                                <option value="{{$item->action10}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action10}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>          
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action11[]" style="width: 50px">
                                                @if($item->action11 == true)
                                                <option value="{{$item->action11}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action11}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action12[]" style="width: 50px">
                                                @if($item->action12 == true)
                                                <option value="{{$item->action12}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action12}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action13[]" style="width: 50px">
                                                @if($item->action13 == true)
                                                <option value="{{$item->action13}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action13}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                                       
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action14[]" style="width: 50px">
                                                @if($item->action14 == true)
                                                <option value="{{$item->action14}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action14}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action15[]" style="width: 50px">
                                                @if($item->action15 == true)
                                                <option value="{{$item->action15}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action15}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action16[]" style="width: 50px">
                                                @if($item->action16 == true)
                                                <option value="{{$item->action16}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action16}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                      
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action17[]" style="width: 50px">
                                                @if($item->action17 == true)
                                                <option value="{{$item->action17}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action17}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action18[]" style="width: 50px">
                                                @if($item->action18 == true)
                                                <option value="{{$item->action18}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action18}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                     
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action19[]" style="width: 50px">
                                                @if($item->action19 == true)
                                                <option value="{{$item->action19}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action19}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action20[]" style="width: 50px">
                                                @if($item->action20 == true)
                                                <option value="{{$item->action20}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action20}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action21[]" style="width: 50px">
                                                @if($item->action21 == true)
                                                <option value="{{$item->action21}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action21}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action22[]" style="width: 50px">
                                                @if($item->action22 == true)
                                                <option value="{{$item->action22}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action22}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                      
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action23[]" style="width: 50px">
                                                @if($item->action23 == true)
                                                <option value="{{$item->action23}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action23}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                       </td>                                                              
                                       <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action24[]" style="width: 50px">
                                                @if($item->action24 == true)
                                                <option value="{{$item->action24}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action24}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action25[]" style="width: 50px">
                                                @if($item->action25 == true)
                                                <option value="{{$item->action25}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action25}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action26[]" style="width: 50px">
                                                @if($item->action26 == true)
                                                <option value="{{$item->action26}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action26}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action27[]" style="width: 50px">
                                                @if($item->action27 == true)
                                                <option value="{{$item->action27}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action27}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action28[]" style="width: 50px">
                                                @if($item->action28 == true)
                                                <option value="{{$item->action28}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action28}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                       
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action29[]" style="width: 50px">
                                                @if($item->action29 == true)
                                                <option value="{{$item->action29}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action29}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action30[]" style="width: 50px">
                                                @if($item->action30 == true)
                                                <option value="{{$item->action30}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action30}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                            <select class="form-control" name="action31[]" style="width: 50px">
                                                @if($item->action31 == true)
                                                <option value="{{$item->action31}}">/</option>
                                                <option value="0">X</option>
                                                @else
                                                <option value="{{$item->action31}}">X</option>
                                                <option value="1">/</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div><hr>
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
    $('#tb_ppe').DataTable({                   
        "autoWidth": false,
        "pageLength": 50,
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