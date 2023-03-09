<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลมาตราฐานระบบ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="doc_grocode" class="col-form-label">รหัสมาตราฐานระบบ</label>
                            <input type="text" class="form-control @error('doc_grocode') is-invalid @enderror" placeholder="ระบุรหัสมาตราฐานระบบ" wire:model="doc_grocode">
                            @error('doc_grocode')
                            <div id="doc_grocode_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="doc_groname" class="col-form-label">ชื่อมาตราฐานระบบ</label>
                            <input type="text" class="form-control @error('doc_groname') is-invalid @enderror" placeholder="ระบุชื่อมาตราฐานระบบ" wire:model="doc_groname">
                            @error('doc_groname')
                            <div id="doc_groname_validation" class="invalid-feedback">
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
