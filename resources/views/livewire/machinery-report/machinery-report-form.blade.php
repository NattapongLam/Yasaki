<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ผลการดำเนิการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="ms_machine_code" class="col-form-label">รหัสเครื่องจักร</label>
                            <input type="text" class="form-control" wire:model="ms_machine_code" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ms_machine_name" class="col-form-label">ชื่อเครื่องจักร</label>
                            <input type="text" class="form-control" wire:model="ms_machine_name" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="machinery_hd_checkdate" class="col-form-label">วันที่ดำเนินการ</label>
                            <input type="date" class="form-control" wire:model="machinery_hd_checkdate" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="machinery_hd_personsave" class="col-form-label">ผู้ดำเนินการ</label>
                            <input type="text" class="form-control" wire:model="machinery_hd_personsave" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="machinery_hd_checksave" class="col-form-label">ผู้ตรวจสอบ</label>
                            <input type="text" class="form-control" wire:model="machinery_hd_checksave" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="machinery_hd_checknote" class="col-form-label">รายละเอียด</label>
                            <textarea class="form-control" wire:model="machinery_hd_checknote" readonly></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" wire:click="save">ตรวจรับ</button>
                </div>
            </div>
        </div>
    </div>
</div>

