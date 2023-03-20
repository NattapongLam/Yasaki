<div>
    <form wire:submit.prevent="save">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3" style="text-align: left;">
                    <h3 class="card-title" style="color: red">ผู้ตรวจสอบ :</h3>
                    <input type="text" name="checksheetmc_hd_save" id="checksheetmc_hd_save" wire:model="checksheetmc_hd_save"
                    class="form-control" readonly>
                </div>
                <div class="col-3" style="text-align: left;">
                    <h3 class="card-title" style="color: red">เลขที่ :</h3>
                    <input type="text" name="checksheetmc_hd_docuno" id="checksheetmc_hd_docuno" wire:model="checksheetmc_hd_docuno"
                    class="form-control" readonly>
                </div>
                <div class="col-3" style="text-align: left;">
                    <h3 class="card-title" style="color: red">รหัสเครื่องจักร :</h3>
                    <input type="text" name="ms_machine_code" id="ms_machine_code" wire:model="ms_machine_code"
                    class="form-control" readonly>
                </div>
                <div class="col-3" style="text-align: left;">
                    <h3 class="card-title" style="color: red">ชื่อเครื่องจักร :</h3>
                    <input type="text" name="ms_machine_name" id="ms_machine_name" wire:model="ms_machine_name"
                    class="form-control" readonly>
                </div>        
            </div><hr>
            {{-- <div class="row">
                <div class="col-12">
                    <img src="{{URL::asset($pic)}}" class="img-fluid" alt="Responsive image">
                </div>               
            </div> --}}
            <div class="row"> 
                <label class="col-form-label" style="color: red">รายละเอียดการตรวจ</label>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>รายละเอียด</th>
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
                        </thead>
                        <tbody>
                            @foreach ($chkdt as $item)
                                <tr>
                                    <td>{{$item->machinecheck_dt_listno}}</td>
                                    <td>{{$item->machinecheck_dt_name}}</td>
                                    <td>
                                        @if($item->action1 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                                                             
                                    </td>
                                    <td>
                                        @if($item->action2 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action3 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action4 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action5 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action6 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action7 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action8 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action9 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action10 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action11 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action12 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action13 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action14 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action15 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action16 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action17 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action18 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action19 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action20 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action21 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action22 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action23 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action24 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action25 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action26 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action27 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action28 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action29 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action30 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                    <td>
                                        @if($item->action31 == 1)
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="1"
                                            checked>
                                        </div>
                                        @else
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2" value="0">
                                        </div>
                                        @endif                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><hr>
            <div class="row">
                <label class="col-form-label" style="color: red">ผู้ดำเนินการตรวจ</label>
                @foreach ($chkemp as $key => $item)
                <div class="col-2 form-check mb-2">
                    <p>{{$item->checksheetmc_note_no}}/{{$item->checksheetmc_note_empname}} : {{$item->checksheetmc_note_remark}}</p>
                </div>
                @endforeach 
            </div><hr>              
            {{-- <div class="row">
                <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึก</button>  
            </div>   --}}
            </div>      
        </div>       
    </form>  
</div>

