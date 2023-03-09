<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลประเภทเอกสารควบคุม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="doc_typcode" class="col-form-label">รหัสประเภทเอกสารควบคุม</label>
                            <input type="text" class="form-control @error('doc_typcode') is-invalid @enderror" placeholder="ระบุรหัสประเภทเอกสารควบคุม" wire:model="doc_typcode">
                            @error('doc_typcode')
                            <div id="doc_typcode_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="doc_typname" class="col-form-label">ชื่อประเภทเอกสารควบคุม</label>
                            <input type="text" class="form-control @error('doc_typname') is-invalid @enderror" placeholder="ระบุชื่อประเภทเอกสารควบคุม" wire:model="doc_typname">
                            @error('doc_typname')
                            <div id="doc_typname_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
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

