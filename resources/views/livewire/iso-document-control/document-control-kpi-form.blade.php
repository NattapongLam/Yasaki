<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูล KPI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="kpi_date" class="col-form-label">วันที่</label>
                            <input type="date" class="form-control @error('kpi_date') is-invalid @enderror" wire:model="kpi_date">
                            @error('kpi_date')
                            <div id="kpi_date_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dep_name" class="col-form-label">แผนก</label>
                            <select class="form-control @error('dep_name') is-invalid @enderror" wire:model="dep_name">
                                @foreach ($dep as $item)
                                 <option value="{{$item->department_refcode}}">{{$item->department_name}}</option>   
                                @endforeach
                            </select>
                            @error('dep_name')
                            <div id="dep_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kpi_name" class="col-form-label">ชื่อ KPI</label>
                            <input type="text" class="form-control @error('kpi_name') is-invalid @enderror" wire:model="kpi_name">
                            @error('kpi_name')
                            <div id="kpi_name_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kpi_file" class="col-form-label">ไฟล์ KPI</label>
                            <input class="form-control @error('kpi_file') is-invalid @enderror" type="file" id="kpi_file" name="kpi_file"  wire:model="kpi_file">
                            @error('kpi_file')
                            <div id="kpi_file_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control" wire:model="kpi_status">
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


