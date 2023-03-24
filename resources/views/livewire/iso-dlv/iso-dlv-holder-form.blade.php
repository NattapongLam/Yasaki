<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ตรวจรับเอกสาร</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="iso_doculist_code" class="col-form-label">รหัสเอกสาร</label>
                            <input type="text" class="form-control" wire:model="iso_doculist_code">
                        </div>
                        <div class="mb-3">
                            <label for="iso_doculist_name" class="col-form-label">ชื่อเอกสาร</label>
                            <input type="text" class="form-control" wire:model="iso_doculist_name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="iso_docuholder_status">
                                <option value="รอดำเนินการ">รอดำเนินการ</option>
                                <option value="รับทราบ">รับทราบ</option>
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