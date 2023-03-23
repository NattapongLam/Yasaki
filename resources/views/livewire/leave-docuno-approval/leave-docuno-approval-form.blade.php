<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ข้อมูลใบลา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>วันที่</th>
                                        <th>ประเภทลา</th>
                                        <th>รายละเอียด</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sub as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            {{\Carbon\Carbon::parse($item->ldoc_datestart)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item->ldoc_dateend)->format('d/m/Y')}}
                                            ({{$item->ltype_name}})
                                        </td>
                                        <td>{{$item->leav_name}}</td>
                                        <td>{{$item->ldoc_reamrk}}</td>
                                    </tr>
                                    @endforeach                           
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">สถานะ</label>
                            <select class="form-control @error('lsta_id') is-invalid @enderror" wire:model="lsta_id">
                                <option value="3">อนุมัติ</option>
                                <option value="4">ไม่อนุมัติ</option>
                            </select>
                            @error('lsta_id')
                            <div id="lsta_id_validation" class="invalid-feedback">
                              {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">หมายเหตุ</label>
                            <textarea class="form-control @error('ldoc_appdesc') is-invalid @enderror" wire:model="ldoc_appdesc"></textarea>
                            @error('ldoc_appdesc')
                            <div id="ldoc_appdesc_validation" class="invalid-feedback">
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

