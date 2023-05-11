<div>
    <link href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
    <form wire:submit.prevent="save">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <label class="col-form-label" style="color: red">ผู้ตรวจสอบ :</label>
                    <input type="text" name="checksheetmc_hd_save" id="checksheetmc_hd_save" wire:model="checksheetmc_hd_save"
                    class="form-control" readonly>
                </div>
                <div class="col-12 col-md-3">
                    <label class="col-form-label" style="color: red">เลขที่ :</label>
                    <input type="text" name="checksheetmc_hd_docuno" id="checksheetmc_hd_docuno" wire:model="checksheetmc_hd_docuno"
                    class="form-control" readonly>
                </div>
                <div class="col-12 col-md-3">
                    <label class="col-form-label" style="color: red">รหัสเครื่องจักร :</label>
                    <input type="text" name="ms_machine_code" id="ms_machine_code" wire:model="ms_machine_code"
                    class="form-control" readonly>
                </div>
                <div class="col-12 col-md-3">
                    <label class="col-form-label" style="color: red">ชื่อเครื่องจักร :</label>
                    <input type="text" name="ms_machine_name" id="ms_machine_name" wire:model="ms_machine_name"
                    class="form-control" readonly>
                </div>        
            </div><hr>
            <div class="row">
                <div class="col-12">
                    <center>
                        <img src="{{URL::asset('assets/images/machinechecksheets/'.$pic)}}" class="img-thumbnail" width="1000">
                    </center>                  
                </div>               
            </div>
            <div class="row"> 
                <h3 class="card-title" style="color: red">รายละเอียดการตรวจ</h3>
                <div class="table-responsive">
                    <div style="overflow-x:auto;">
                    <table id="tb_cs_ptg" class="table mb-0">
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
                            @foreach ($chkdt as $item)
                                <tr>
                                    <td>
                                        <label class="col-form-label" style="width: 200px">
                                            {{$item->machinecheck_dt_listno}}/{{$item->machinecheck_dt_name}}
                                            <input type="hidden" name="dt_id[]" value="{{$item->id}}">
                                        </label>
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
            </div><hr>                       
            {{-- <div class="row">
                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึก</button>  
            </div>   --}}
            </div>      
        </div>
        <div class="card"> 
            <div class="card-body"> 
        <div class="row">
        <h3 class="card-title" style="color: red">ผู้ดำเนินการตรวจ</h3>
            @foreach ($chkemp as $key => $item)                   
                    <div class="col-12 col-md-3" style="border-style: ridge; border-collapse: separate;" >
                        <label class="col-form-label">วันที่ :{{$item->checksheetmc_note_no}}</label>
                        <select class="form-control" name="checksheetmc_note_empname[]">
                            @if($item->checksheetmc_note_empname)
                              <option>{{$item->checksheetmc_note_empname}}</option>  
                            @endif
                            <option>เลือกผู้ตรวจเช็ค</option>  
                            @foreach ($emp as $item)
                            <option value="{{$item->employee_fullname}}">
                                {{$item->employee_fullname}}
                            </option>
                            @endforeach                         
                        </select>
                        หมายเหตุ :<input class="form-control" value="{{$item->checksheetmc_note_remark}}">
                    </div>    
            @endforeach 
        </div><br>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
        </div>
        </div>
        </div><hr>       
    </form>  
</div>
@push('scriptjs')
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tb_cs_ptg').DataTable({             
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
