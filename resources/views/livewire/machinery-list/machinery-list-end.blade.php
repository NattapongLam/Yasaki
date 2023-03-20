<div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3"><h2 class="card-title">บันทึกแจ้งซ่อมเครื่องจักร</h2></div>
                <div class="col-3"></div>
                <div class="col-4"></div>
                <div class="col-2" style="text-align: right;">
                    <h3 class="card-title" style="color: red">สถานะเอกสาร</h3>
                    <input type="text" name="machinery_hd_status_name" id="machinery_hd_status_name" wire:model="machinery_hd_status_name"
                    class="form-control" readonly>
                </div>        
            </div>                      
                <div class="row">
                    <div class="col-12 col-md-3">
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
                    <div class="col-12 col-md-3">
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
                    <div class="col-12 col-md-3" >
                        <div class="form-group">
                            <label for="machinery_hd_type" class="col-form-label">ประเภทงาน</label>
                            <input type="text" name="machinery_hd_type" id="machinery_hd_type" wire:model="machinery_hd_type"
                        class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3" >
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <input type="text" name="department_name" id="department_name" wire:model="department_name"
                        class="form-control" readonly>
                        </div>
                    </div>                                     
                </div>
                <div class="row">
                    <div class="col-12 col-md-3" >
                        <div class="form-group">
                            <label for="ms_machine_code" class="col-form-label">รหัสเครื่องจักร</label>
                            <input type="text" name="ms_machine_code" id="ms_machine_code" wire:model="ms_machine_code"
                            class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                        <label for="ms_machine_name" class="col-form-label">ชื่อเครื่องจักร</label>
                        <input type="text" name="ms_machine_name" id="ms_machine_name" placeholder="ชื่อเครื่องจักร" wire:model="ms_machine_name"
                        class="form-control @error('ms_machine_name') is-invalid @enderror" readonly>
                        @error('ms_machine_name')
                        <div id="ms_machine_name_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3" >
                        <div class="form-group">
                            <label for="ms_machine_system_name" class="col-form-label">ระบบ</label>
                            <input type="text" name="ms_machine_system_name" id="ms_machine_system_name" wire:model="ms_machine_system_name"
                            class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3" >
                        <div class="form-group">
                            <label for="ms_machine_service_name" class="col-form-label">บริการ</label>
                            <input type="text" name="ms_machine_service_name" id="ms_machine_service_name" wire:model="ms_machine_service_name"
                            class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">                                                        
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                        <label for="machinery_hd_lcaol" class="col-form-label">สถานที่</label>
                        <input type="text" name="machinery_hd_lcaol" id="machinery_hd_lcaol" placeholder="สถานที่" wire:model="machinery_hd_lcaol"
                        class="form-control @error('machinery_hd_lcaol') is-invalid @enderror" readonly>
                        @error('machinery_hd_lcaol')
                            <div id="machinery_hd_lcaol_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
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
                    <div class="col-12 col-md-3" >
                        <div class="form-group">
                            <label for="machinery_hd_personsave" class="col-form-label">ผู้ดำเนินการ</label>
                            <input type="text" name="machinery_hd_personsave" id="machinery_hd_personsave" wire:model="machinery_hd_personsave"
                            class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">                           
                                <label for="machinery_hd_refdocuno" class="col-form-label">เลขที่อ้างอิง</label>
                                <input type="text" name="machinery_hd_refdocuno" id="machinery_hd_refdocuno" wire:model="machinery_hd_refdocuno"
                                class="form-control" placeholder="เลขที่อ้างอิง" readonly>                        
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
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="machinery_hd_note" class="col-form-label">อาการเสีย</label>
                            <textarea class="form-control @error('machinery_hd_note') is-invalid @enderror" wire:model="machinery_hd_note"></textarea>
                            @error('machinery_hd_note')
                            <div id="machinery_hd_note_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="machinery_hd_checknote" class="col-form-label">ผลการตรวจสอบ</label>
                            <textarea class="form-control @error('machinery_hd_checknote') is-invalid @enderror" wire:model="machinery_hd_checknote"></textarea>
                            @error('machinery_hd_checknote')
                            <div id="machinery_hd_checknote_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="row">
                        <div class="col-12" >
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รายละเอียด</th>
                                            <th>จำนวนชั่วโมง</th>
                                            <th>วันที่เสร็จ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listdt as $key => $item)
                                            <tr>
                                               <td>{{$key+1}}</td> 
                                               <td>{{$item->machinery_dt_remark}}</td> 
                                               <td>{{$item->machinery_dt_hour}}</td> 
                                               <td>{{$item->machinery_dt_date}}</td> 
                                            </tr>
                                        @endforeach                                                                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>      
        </div> <hr>          
</div>

