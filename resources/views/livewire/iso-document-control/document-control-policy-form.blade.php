<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูล Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="pol_date" class="col-form-label">วันที่</label>
                            <input type="date" class="form-control @error('pol_date') is-invalid @enderror" wire:model="pol_date">
                            @error('pol_date')
                            <div id="pol_date_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pol_name" class="col-form-label">ชื่อประกาศ</label>
                            <input type="text" class="form-control @error('pol_name') is-invalid @enderror" wire:model="pol_name">
                            @error('pol_name')
                            <div id="pol_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pol_file" class="col-form-label">ไฟล์ pol</label>
                            <input class="form-control @error('pol_file') is-invalid @enderror" type="file" id="pol_file" name="pol_file"  wire:model="pol_file">
                            @error('pol_file')
                            <div id="pol_file_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="pol_status">
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
