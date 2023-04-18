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
            <h3 class="card-title">แบบบันทึกการตรวจอุปกรณ์ป้องกันภัยส่วนบุคคล(PPE) (YSK3-FM-SMS-11)</h3>
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
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap w-100 text-center">
                                <tbody>
                                    @foreach ($dt as $key => $item)
                                    <tr style="background-color:powderblue">
                                        <td colspan="2">
                                            <label class="col-form-label">
                                            {{$item->emp_listno}}/{{$item->emp_fullname}}
                                            </label>
                                            <input type="hidden" value="{{$item->id}}" name="dt_id[]">
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">01 :</label>&nbsp;
                                            <select class="form-control" name="action1[]">
                                                @if($item->action1 == true)
                                                <option value="{{$item->action1}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action1}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">02 :</label>&nbsp;
                                            <select class="form-control" name="action2[]">
                                                @if($item->action2 == true)
                                                <option value="{{$item->action2}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action2}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">03 :</label>&nbsp;
                                            <select class="form-control" name="action3[]">
                                                @if($item->action3 == true)
                                                <option value="{{$item->action3}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action3}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                                                                       
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">04 :</label>&nbsp;
                                            <select class="form-control" name="action4[]">
                                                @if($item->action4 == true)
                                                <option value="{{$item->action4}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action4}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>     
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">05 :</label>&nbsp;
                                            <select class="form-control" name="action5[]">
                                                @if($item->action5 == true)
                                                <option value="{{$item->action5}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action5}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>    
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">06 :</label>&nbsp;
                                            <select class="form-control" name="action6[]">
                                                @if($item->action6 == true)
                                                <option value="{{$item->action6}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action6}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">07 :</label>&nbsp;
                                            <select class="form-control" name="action7[]">
                                                @if($item->action7 == true)
                                                <option value="{{$item->action7}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action7}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">08 :</label>&nbsp;
                                            <select class="form-control" name="action8[]">
                                                @if($item->action8 == true)
                                                <option value="{{$item->action8}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action8}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                                    
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">09 :</label>&nbsp;
                                            <select class="form-control" name="action9[]">
                                                @if($item->action9 == true)
                                                <option value="{{$item->action9}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action9}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">10 :</label>&nbsp;
                                            <select class="form-control" name="action10[]">
                                                @if($item->action10 == true)
                                                <option value="{{$item->action10}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action10}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>          
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">11 :</label>&nbsp;
                                            <select class="form-control" name="action11[]">
                                                @if($item->action11 == true)
                                                <option value="{{$item->action11}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action11}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">12 :</label>&nbsp;
                                            <select class="form-control" name="action12[]">
                                                @if($item->action12 == true)
                                                <option value="{{$item->action12}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action12}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">13 :</label>&nbsp;
                                            <select class="form-control" name="action13[]">
                                                @if($item->action13 == true)
                                                <option value="{{$item->action13}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action13}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                       
                                    </tr>
                                    <tr>  
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">14 :</label>&nbsp;
                                            <select class="form-control" name="action14[]">
                                                @if($item->action14 == true)
                                                <option value="{{$item->action14}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action14}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">15 :</label>&nbsp;
                                            <select class="form-control" name="action15[]">
                                                @if($item->action15 == true)
                                                <option value="{{$item->action15}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action15}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">16 :</label>&nbsp;
                                            <select class="form-control" name="action16[]">
                                                @if($item->action16 == true)
                                                <option value="{{$item->action16}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action16}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                      
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">17 :</label>&nbsp;
                                            <select class="form-control" name="action17[]">
                                                @if($item->action17 == true)
                                                <option value="{{$item->action17}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action17}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">18 :</label>&nbsp;
                                            <select class="form-control" name="action18[]">
                                                @if($item->action18 == true)
                                                <option value="{{$item->action18}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action18}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                     
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">19 :</label>&nbsp;
                                            <select class="form-control" name="action19[]">
                                                @if($item->action19 == true)
                                                <option value="{{$item->action19}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action19}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">20 :</label>&nbsp;
                                            <select class="form-control" name="action20[]">
                                                @if($item->action20 == true)
                                                <option value="{{$item->action20}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action20}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">21 :</label>&nbsp;
                                            <select class="form-control" name="action21[]">
                                                @if($item->action21 == true)
                                                <option value="{{$item->action21}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action21}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">22 :</label>&nbsp;
                                            <select class="form-control" name="action22[]">
                                                @if($item->action22 == true)
                                                <option value="{{$item->action22}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action22}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                      
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">23 :</label>&nbsp;
                                            <select class="form-control" name="action23[]">
                                                @if($item->action23 == true)
                                                <option value="{{$item->action23}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action23}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                       </td>                                                              
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">24 :</label>&nbsp;
                                            <select class="form-control" name="action24[]">
                                                @if($item->action24 == true)
                                                <option value="{{$item->action24}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action24}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">25 :</label>&nbsp;
                                            <select class="form-control" name="action25[]">
                                                @if($item->action25 == true)
                                                <option value="{{$item->action25}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action25}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">26 :</label>&nbsp;
                                            <select class="form-control" name="action26[]">
                                                @if($item->action26 == true)
                                                <option value="{{$item->action26}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action26}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">27 :</label>&nbsp;
                                            <select class="form-control" name="action27[]">
                                                @if($item->action27 == true)
                                                <option value="{{$item->action27}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action27}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">28 :</label>&nbsp;
                                            <select class="form-control" name="action28[]">
                                                @if($item->action28 == true)
                                                <option value="{{$item->action28}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action28}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>                                                       
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">29 :</label>&nbsp;
                                            <select class="form-control" name="action29[]">
                                                @if($item->action29 == true)
                                                <option value="{{$item->action29}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action29}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">30 :</label>&nbsp;
                                            <select class="form-control" name="action30[]">
                                                @if($item->action30 == true)
                                                <option value="{{$item->action30}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action30}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
                                                @endif   
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <label class="col-form-label">31 :</label>&nbsp;
                                            <select class="form-control" name="action31[]">
                                                @if($item->action31 == true)
                                                <option value="{{$item->action31}}">ครบ</option>
                                                <option value="0">ไม่ครบ</option>
                                                @else
                                                <option value="{{$item->action31}}">ไม่ครบ</option>
                                                <option value="1">ครบ</option>
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
                </div><hr>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection