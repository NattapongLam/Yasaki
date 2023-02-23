<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลกลุ่มเครื่อง</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="gruo_code" class="col-form-label">รหัสกลุ่มเครื่อง</label>
                            <input type="text" class="form-control @error('gruo_code') is-invalid @enderror" placeholder="ระบุรหัสกลุ่มเครื่อง" wire:model="gruo_code">
                            @error('gruo_code')
                            <div id="gruo_code_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="gruo_name" class="col-form-label">ชื่อกลุ่มเครื่อง</label>
                            <input type="text" class="form-control @error('gruo_name') is-invalid @enderror" placeholder="ระบุชื่อกลุ่มเครื่อง" wire:model="gruo_name">
                            @error('gruo_name')
                            <div id="gruo_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="gruo_status">
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
