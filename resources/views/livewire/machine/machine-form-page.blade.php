<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-3"><h3 class="card-title">ฟอร์มเครื่องจักร</h3></div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3" style="text-align: right;"></div>
            </div>                      
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="mc_code" class="col-form-label">รหัสเครื่องจักร</label>
                        <input type="text" name="mc_code" id="mc_code" placeholder="รหัสเครื่องจักร" wire:model="mc_code"
                        class="form-control @error('mc_code') is-invalid @enderror">
                        @error('mc_code')
                        <div id="mc_code_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="mc_name" class="col-form-label">ชื่อเครื่องจักร</label>
                        <input type="text" name="mc_name" id="mc_name" placeholder="ชื่อเครื่องจักร" wire:model="mc_name"
                        class="form-control @error('mc_name') is-invalid @enderror">
                        @error('mc_name')
                        <div id="mc_name_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="mc_brand" class="col-form-label">ยี่ห้อเครื่องจักร</label>
                        <input type="text" name="mc_brand" id="mc_brand" placeholder="ยี่ห้อเครื่องจักร" wire:model="mc_brand"
                        class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="mc_size" class="col-form-label">ขนาดเครื่องจักร</label>
                        <input type="text" name="mc_size" id="mc_size" placeholder="ขนาดเครื่องจักร" wire:model="mc_size"
                        class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="mc_date" class="col-form-label">วันที่ซื้อ</label>
                        <input type="date" name="mc_date" id="mc_date" wire:model="mc_date"
                        class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="mcgroup_id" class="col-form-label">กลุ่มเครื่องจักร</label>
                        <select name="mcgroup_id" id="mcgroup_id" wire:model="mcgroup_id"
                        class="form-control select2-search-disable @error('mcgroup_id') is-invalid @enderror">                       
                        <option value="">-- กรุณาเลือกกลุ่มเครื่องจักร --</option>
                        @foreach ($mcgroup as $item)
                        <option value="{{$item->id}}">{{$item->gruo_code}}/{{$item->gruo_name}}</option>
                        @endforeach
                        </select>
                        @error('mcgroup_id')
                        <div id="mcgroup_id_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="mc_status" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="mc_status">
                                <option value="1">ใช้งาน</option>
                                <option value="0">ยกเลิก</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="mc_pdt" class="col-form-label">ใช้ในการผลิต</label>
                            <select class="form-control" wire:model="mc_pdt">
                                <option value="1">ใช้</option>
                                <option value="0">ไม่ใช้</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="form-group">
                            <label for="mc_remark" class="col-form-label">รายละเอียด</label>
                            <textarea class="form-control" wire:model="mc_remark"></textarea>
                        </div>
                    </div><hr>
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>
            </form>           
        </div>      
    </div>
</div>
