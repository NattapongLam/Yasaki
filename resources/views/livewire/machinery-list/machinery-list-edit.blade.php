<div>
    <form wire:submit.prevent="save">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3"><h2 class="card-title">บันทึกแจ้งซ่อมเครื่องจักร</h2></div>
                <div class="col-3"></div>
                <div class="col-3" style="text-align: right;"><h3 class="card-title" style="color: red">สถานะเอกสาร</h3></div>
                <div class="col-3" style="text-align: right;">                      
                        <select class="form-control @error('machinery_hd_status_id') is-invalid @enderror" wire:model="machinery_hd_status_id">
                            <option value="3">ดำเนินการแล้ว</option>
                            <option value="2">ยกเลิก</option>
                        </select>
                        @error('machinery_hd_status_id')
                        <div id="machinery_hd_status_id_validation" class="invalid-feedback">
                        {{$message}}          
                        </div>
                        @enderror           
                </div>        
            </div>                      
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="machinery_hd_date" class="col-form-label">วันที่</label>
                        <input type="date" name="machinery_hd_date" id="machinery_hd_date" wire:model="machinery_hd_date"
                        class="form-control @error('machinery_hd_date') is-invalid @enderror" readonly>
                        @error('machinery_hd_date')
                        <div id="machinery_hd_date_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="machinery_hd_docuno" class="col-form-label">เลขที่เอกสาร</label>
                        <input type="text" name="machinery_hd_docuno" id="machinery_hd_docuno" wire:model="machinery_hd_docuno"
                        class="form-control @error('machinery_hd_docuno') is-invalid @enderror" readonly>
                        <input type="hidden" name="machinery_hd_number" id="machinery_hd_number" wire:model="machinery_hd_number">
                        @error('machinery_hd_docuno')
                        <div id="machinery_hd_docuno_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label for="machinery_hd_type" class="col-form-label">ประเภทงาน</label>
                            <select class="form-control @error('machinery_hd_type') is-invalid @enderror" wire:model="machinery_hd_type">
                                <option value="ด่วน">ด่วน</option>
                                <option value="PM">PM</option>
                            </select>
                            @error('machinery_hd_type')
                            <div id="machinery_hd_type_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <select class="form-control @error('department_name') is-invalid @enderror" wire:model="department_name" disabled>
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
                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label for="ms_machine_code" class="col-form-label">รหัสเครื่องจักร</label>
                            <select class="form-control" wire:model="ms_machine_code">
                                <option value="">-- กรุณาเลือกรหัสเครื่องจักร --</option>                      
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="ms_machine_name" class="col-form-label">ชื่อเครื่องจักร</label>
                        <input type="text" name="ms_machine_name" id="ms_machine_name" placeholder="ชื่อเครื่องจักร" wire:model="ms_machine_name"
                        class="form-control @error('ms_machine_name') is-invalid @enderror">
                        @error('ms_machine_name')
                        <div id="ms_machine_name_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label for="ms_machine_system_name" class="col-form-label">ระบบ</label>
                            <select class="form-control  @error('ms_machine_system_name') is-invalid @enderror" wire:model="ms_machine_system_name">
                                <option value="">-- กรุณาเลือกระบบ --</option>
                                @foreach ($sys as $item)
                                <option value="{{$item->syst_name}}">{{$item->syst_name}}</option>
                                @endforeach                           
                            </select>
                            @error('ms_machine_system_name')
                            <div id="ms_machine_system_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4" >
                        <div class="form-group">
                            <label for="ms_machine_service_name" class="col-form-label">บริการ</label>
                            <select class="form-control  @error('ms_machine_service_name') is-invalid @enderror" wire:model="ms_machine_service_name">
                                <option value="">-- กรุณาเลือกบริการ --</option>     
                                @foreach ($ser as $item)
                                <option value="{{$item->serv_name}}">{{$item->serv_name}}</option>
                                @endforeach                   
                            </select>
                            @error('ms_machine_service_name')
                            <div id="ms_machine_service_name_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="machinery_hd_lcaol" class="col-form-label">สถานที่</label>
                        <input type="text" name="machinery_hd_lcaol" id="machinery_hd_lcaol" placeholder="สถานที่" wire:model="machinery_hd_lcaol"
                        class="form-control @error('machinery_hd_lcaol') is-invalid @enderror">
                        @error('machinery_hd_lcaol')
                            <div id="machinery_hd_lcaol_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" >
                        <div class="form-group">
                            <label for="machinery_hd_note" class="col-form-label">รายละเอียด/อาการเสีย</label>
                            <textarea class="form-control @error('machinery_hd_note') is-invalid @enderror" wire:model="machinery_hd_note"></textarea>
                            @error('machinery_hd_note')
                            <div id="machinery_hd_note_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>   
            </div>      
        </div> <hr>          
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">บันทึกผลการซ่อมเครื่องจักร</h2>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="machinery_hd_checkdate" class="col-form-label">วันที่</label>
                        <input type="date" name="machinery_hd_checkdate" id="machinery_hd_date" wire:model="machinery_hd_checkdate"
                        class="form-control @error('machinery_hd_checkdate') is-invalid @enderror">
                        @error('machinery_hd_checkdate')
                        <div id="machinery_hd_checkdate_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="machinery_hd_personsave" class="col-form-label">ผู้ดำเนินการ</label>
                            <select class="form-control  @error('machinery_hd_personsave') is-invalid @enderror" wire:model="machinery_hd_personsave">
                                <option value="">-- กรุณาเลือกผู้ดำเนินการ --</option>     
                                @foreach ($emp as $item)
                                <option value="{{$item->employee_fullname}}">{{$item->employee_fullname}}</option>
                                @endforeach                   
                            </select>
                            @error('machinery_hd_personsave')
                            <div id="machinery_hd_personsave_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            
                                <label for="vendor_code" class="col-form-label">รหัสคู่ค้า</label>
                                <select class="form-control" wire:model="vendor_code">
                                    <option value="">-- กรุณาเลือกรหัสคู่ค้า --</option>                      
                                </select>
                            </div>                                              
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                        <label for="vendor_name" class="col-form-label">ชื่อคู่ค้า</label>
                        <input type="text" name="vendor_name" id="vendor_name" wire:model="vendor_name"
                        class="form-control" placeholder="ชื่อคู่ค้า">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">                           
                                <label for="machinery_hd_refdocuno" class="col-form-label">เลขที่อ้างอิง</label>
                                <input type="text" name="machinery_hd_refdocuno" id="machinery_hd_refdocuno" wire:model="machinery_hd_refdocuno"
                                class="form-control" placeholder="เลขที่อ้างอิง">                        
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                        <label for="machinery_hd_pic2" class="col-form-label">รูปภาพ</label>
                        <input class="form-control" type="file" id="machinery_hd_pic2" name="machinery_hd_pic2" wire:model="machinery_hd_pic2">
                        </div>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-3">
                        <a href="{{route('machinerylist.end',$doc)}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    
                </div>
                <div class="row">
                    <div class="col-12" >
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รายละเอียด</th>
                                        <th>จำนวนชั่วโมง</th>
                                        <th>วันที่เสร็จ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $item)
                                        <tr>
                                           <td>{{$key+1}}</td> 
                                           <td>{{$item->machinery_dt_remark}}</td> 
                                           <td>{{$item->machinery_dt_hour}}</td> 
                                           <td>{{$item->machinery_dt_date}}</td> 
                                           <td></td>
                                        </tr>
                                    @endforeach                                                                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-12" >
                        <div class="form-group">
                            <label for="machinery_hd_checknote" class="col-form-label">รายละเอียด/ผลการตรวจสอบ</label>
                            <textarea class="form-control" wire:model="machinery_hd_checknote"></textarea>
                        </div>
                    </div>
                </div><hr>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>  
                </div>    
            </div>
        </div>         
</form>   
</div>

