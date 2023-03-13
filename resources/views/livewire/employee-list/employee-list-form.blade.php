<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลพนักงาน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="employee_code" class="col-form-label">รหัสพนักงาน</label>
                            <input type="text" class="form-control @error('employee_code') is-invalid @enderror" placeholder="ระบุรหัสพนักงาน" wire:model="employee_code">
                            @error('employee_code')
                            <div id="employee_code_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employee_fullname" class="col-form-label">ชื่อ - นามสกุล</label>
                            <input type="text" class="form-control @error('employee_fullname') is-invalid @enderror" placeholder="ระบุชื่อ - นามสกุล" wire:model="employee_fullname">
                            @error('employee_fullname')
                            <div id="employee_fullname_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="department_id" class="col-form-label">แผนก</label>
                            <select name="department_id" id="department_id" wire:model="department_id"
                        class="form-control select2-search-disable @error('department_id') is-invalid @enderror">                       
                        <option value="">-- กรุณาเลือกแผนก --</option>
                        @foreach ($dep as $item)
                        <option value="{{$item->id}}">{{$item->department_code}}/{{$item->department_name}}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="employee_job" class="col-form-label">ตำแหน่ง</label>
                            <input type="text" class="form-control" wire:model="employee_job">
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