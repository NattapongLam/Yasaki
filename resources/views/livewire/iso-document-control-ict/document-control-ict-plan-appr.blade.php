<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">อนุมัติแผน PM คอมพิวเตอร์และอุปกรณ์ระบบคอมพิวเตอร์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="year_name" class="col-form-label">ประจำปี</label>
                                <input type="text" class="form-control" wire:model="year_name">
                            </div>                          
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                            <label for="planhd_remark" class="col-form-label">หมายเหตุ</label>
                            <input type="text" class="form-control" wire:model="planhd_remark">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                            <label for="planhd_type" class="col-form-label">ประเภทแผน</label>
                            <input type="text" class="form-control" wire:model="planhd_type">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                            <label for="planhd_save" class="col-form-label">ผู้บันทึก</label>
                            <input type="text" class="form-control" wire:model="planhd_save">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                            <label for="approval_note" class="col-form-label">หมายเหตุอนุมัติ</label>
                            <textarea type="text" class="form-control" wire:model="approval_note"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" wire:click="save">อนุมัติ</button>
                </div>
            </div>
        </div>
    </div>
</div>
