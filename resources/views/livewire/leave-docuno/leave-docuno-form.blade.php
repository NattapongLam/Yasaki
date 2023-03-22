<div>
    <div class="card">
        <div class="card-body">    
            <form wire:submit.prevent="cancel">      
            <div class="row">
              
                <div class="col-6">
                    <h3 class="card-title">ฟอร์มบันทึกการลา</h3>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">ยกเลิก</button>  
                </div>
                <div class="col-3"></div>                 
                <div class="col-3"></div>            
            </div>
            </form> 
            <form wire:submit.prevent="save">                      
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="ldoc_datestart" class="col-form-label">วันที่เริ่ม</label>
                        <input type="date" name="ldoc_datestart" id="ldoc_datestart" placeholder="วันที่เริ่ม" wire:model="ldoc_datestart"
                        class="form-control @error('ldoc_datestart') is-invalid @enderror">
                        @error('ldoc_datestart')
                        <div id="ldoc_datestart_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="ldoc_dateend" class="col-form-label">วันที่สิ้นสุด</label>
                        <input type="date" name="ldoc_dateend" id="ldoc_dateend" placeholder="วันที่เริ่ม" wire:model="ldoc_dateend"
                        class="form-control @error('ldoc_dateend') is-invalid @enderror">
                        @error('ldoc_dateend')
                        <div id="ldoc_dateend_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="lconf_id" class="col-form-label">การลา</label>
                        <select name="lconf_id" id="lconf_id" wire:model="lconf_id"
                        class="form-control @error('lconf_id') is-invalid @enderror">                       
                        <option value="">-- กรุณาเลือกการลา --</option>
                        @foreach ($lcon as $item)
                        <option value="{{$item->id}}">{{$item->leav_name}}</option>
                        @endforeach
                        </select>
                        @error('lconf_id')
                        <div id="lconf_id_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="ltype_id" class="col-form-label">ประเภทการลา</label>
                        <select name="ltype_id" id="ltype_id" wire:model="ltype_id"
                        class="form-control @error('ltype_id') is-invalid @enderror">                       
                        <option value="">-- กรุณาเลือกประเภทการลา --</option>
                        @foreach ($ltyp as $item)
                        <option value="{{$item->id}}">{{$item->ltype_name}}</option>
                        @endforeach
                        </select>
                        @error('ltype_id')
                        <div id="ltype_id_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="employee_code" class="col-form-label">รหัสพนักงาน</label>
                        <select name="employee_code" id="employee_code" wire:model="employee_code"
                        class="form-control @error('employee_code') is-invalid @enderror">                       
                        <option value="">-- กรุณาเลือกรหัสพนักงาน --</option>
                        @foreach ($emp as $item)
                        <option value="{{$item->employee_code}}">{{$item->employee_fullname}} ({{$item->employee_code}})</option>
                        @endforeach
                        </select>
                        @error('employee_code')
                        <div id="employee_code_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="ldoc_fileup" class="col-form-label">รูปภาพ</label>
                            <input class="form-control" type="file" id="ldoc_fileup" name="ldoc_fileup" wire:model="ldoc_fileup">
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="form-group">
                            <label for="ldoc_reamrk" class="col-form-label">รายละเอียด</label>
                            <textarea class="form-control  @error('ldoc_reamrk') is-invalid @enderror" wire:model="ldoc_reamrk"></textarea>
                            @error('ldoc_reamrk')
                            <div id="ldoc_reamrk_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div><hr>
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>
            </form>           
        </div>      
    </div>
</div>