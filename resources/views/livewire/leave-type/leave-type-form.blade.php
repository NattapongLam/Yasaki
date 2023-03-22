<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลประเภทการลา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="ltype_name" class="col-form-label">ประเภทการลา</label>
                            <input type="text" class="form-control @error('ltype_name') is-invalid @enderror" placeholder="ประเภทการลา" wire:model="ltype_name">
                            @error('ltype_name')
                            <div id="leav_code_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ltype_qty" class="col-form-label">จำนวนชั่วโมง</label>
                            <input type="text" class="form-control @error('ltype_qty') is-invalid @enderror" placeholder="จำนวนชั่วโมง" wire:model="ltype_qty">
                            @error('ltype_qty')
                            <div id="ltype_qty_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">หมายเหตุ</label>
                           <textarea class="form-control" wire:model="ltype_desc"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="ltype_status">
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
