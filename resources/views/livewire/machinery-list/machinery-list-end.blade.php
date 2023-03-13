<div>
    <form wire:submit.prevent="save">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">บันทึกผลการซ่อมเครื่องจักร</h2>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="machinery_hd_docuno" class="col-form-label">เลขที่เอกสาร</label>
                        <input type="text" name="machinery_hd_docuno" id="machinery_hd_docuno" wire:model="machinery_hd_docuno"
                        class="form-control" readonly>
                        <input type="hidden" name="machinery_hd_id" id="machinery_hd_id" wire:model="machinery_hd_id">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="machinery_dt_hour" class="col-form-label">จำนวนชั่วโมง</label>
                        <input type="text"  name="machinery_dt_hour" id="machinery_dt_hour" wire:model="machinery_dt_hour"
                        class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="machinery_dt_date" class="col-form-label">วันที่เสร็จ</label>
                        <input type="date" name="machinery_dt_date" id="machinery_dt_date" wire:model="machinery_dt_date"
                        class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" >
                        <div class="form-group">
                            <label for="machinery_dt_remark" class="col-form-label">รายละเอียด</label>
                            <textarea class="form-control" wire:model="machinery_dt_remark"></textarea>
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
