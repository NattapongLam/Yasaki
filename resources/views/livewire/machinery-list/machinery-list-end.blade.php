<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดผลการซ่อมเครื่องจักร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="machinery_hd_docuno" class="col-form-label">เลขที่เอกสาร</label>
                            <input type="text" class="form-control @error('machinery_hd_docuno') is-invalid @enderror" wire:model="machinery_hd_docuno" readonly>
                            @error('machinery_hd_docuno')
                            <div id="machinery_hd_docuno_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="machinery_dt_date" class="col-form-label">วันที่เสร็จ</label>
                            <input type="date" class="form-control @error('machinery_dt_date') is-invalid @enderror"  wire:model="machinery_dt_date">
                            @error('machinery_dt_date')
                            <div id="machinery_dt_date_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="machinery_dt_hour" class="col-form-label">จำนวนชั่วโมง</label>
                            <input type="text" class="form-control @error('machinery_dt_hour') is-invalid @enderror" wire:model="machinery_dt_hour">
                            @error('machinery_dt_hour')
                            <div id="machinery_dt_hour_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="machinery_dt_remark" class="col-form-label">รายละเอียด</label>
                            <textarea class="form-control @error('machinery_dt_remark') is-invalid @enderror" wire:model="machinery_dt_remark"></textarea>
                            @error('machinery_dt_remark')
                            <div id="machinery_dt_remark_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="machinery_dt_flag">
                                <option value="1">ใช้งาน</option>
                                <option value="0">ยกเลิก</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" wire:click="save">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
</div>
