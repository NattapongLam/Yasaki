<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-3"><h2 class="card-title">บันทึกแจ้งซ่อมเครื่องจักร</h2></div>
                <div class="col-3"></div>
                <div class="col-3" style="text-align: right;"></div>
                <div class="col-3" style="text-align: right;"></div>        
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
                    <div class="col-12 col-md-3">
                        <label for="machinery_hd_date" class="col-form-label">สถานะเอกสาร</label>
                        <select class="form-control @error('machinery_hd_status_id') is-invalid @enderror" wire:model="machinery_hd_status_id">
                            <option value="1">รอดำเนินการ</option>
                            <option value="2">ยกเลิก</option>
                        </select>
                        @error('machinery_hd_status_id')
                        <div id="machinery_hd_status_id_validation" class="invalid-feedback">
                        {{$message}}          
                        </div>
                        @enderror   
                    </div>
                    <div class="col-12 col-md-3" >
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
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="department_name" class="col-form-label">แผนก</label>
                            <select class="form-control @error('department_name') is-invalid @enderror" wire:model="department_name">
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
                                @foreach ($mcs as $item)
                                <option value="{{$item->mc_code}}">{{$item->mc_code}}/{{$item->mc_name}}</option>  
                                @endforeach             
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
                    <div class="col-12 col-md-3" >
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
                    <div class="col-12 col-md-3" >
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
                    <div class="col-12 col-md-3">
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
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="machinery_hd_pic1" class="col-form-label">รูปภาพ</label>
                            <input class="form-control" type="file" id="machinery_hd_pic1" name="machinery_hd_pic1" wire:model="machinery_hd_pic1">
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
                </div> <hr>                   
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>  
                </div>                     
            </form>           
        </div>      
    </div>
</div>

