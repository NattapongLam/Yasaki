<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลแผนก</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="department_code" class="col-form-label">รหัสแผนก</label>
                            <input type="text" class="form-control @error('department_code') is-invalid @enderror" placeholder="ระบุรหัสแผนก" wire:model="department_code">
                            @error('department_code')
                            <div id="department_code_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="department_name" class="col-form-label">ชื่อแผนก</label>
                            <input type="text" class="form-control @error('department_name') is-invalid @enderror" placeholder="ระบุชื่อแผนก" wire:model="department_name">
                            @error('department_name')
                            <div id="department_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="department_refcode" class="col-form-label">รหัสอ้างอิง</label>
                            <input type="text" class="form-control @error('department_refcode') is-invalid @enderror" placeholder="ระบุรหัสอ้างอิง" wire:model="department_refcode">
                            @error('department_refcode')
                            <div id="department_refcode_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="department_status">
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
