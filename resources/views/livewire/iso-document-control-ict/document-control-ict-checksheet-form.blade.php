<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">การบำรุงรักษาคอมพิวเตอร์และอุปกรณ์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">                       
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="cit_date" class="col-form-label">วันที่</label>
                                        <input type="date" class="form-control" wire:model="cit_date">
                                    </div>
                                    <div class="col-6">
                                        <label for="com_id" class="col-form-label">ชื่อเครื่อง</label>
                                        <select class="form-control" wire:model="com_id" >
                                            <option value="">-- เลือกเครื่อง --</option>
                                            @foreach ($plan as $item)
                                                <option value="{{$item->com_id}}">{{$item->plandt_comname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                                
                            </div>                     
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="cit_check1" class="col-form-label">ทำความสะอาดแป้นพิมพ์</label>
                                    <select class="form-control" wire:model="cit_check1" >
                                        <option value="1">/</option>
                                        <option value="0">X</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="cit_check2" class="col-form-label">เป่าฝุ่นภายใน</label>
                                    <select class="form-control" wire:model="cit_check2" >
                                        <option value="1">/</option>
                                        <option value="0">X</option>
                                    </select>
                                </div>
                            </div>                         
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="cit_check3" class="col-form-label">เช็คการต่อพ่วง</label>
                                    <select class="form-control" wire:model="cit_check3" >
                                        <option value="1">/</option>
                                        <option value="0">X</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="cit_check4" class="col-form-label">การสแกนไวรัส</label>
                                    <select class="form-control" wire:model="cit_check4" >
                                        <option value="1">/</option>
                                        <option value="0">X</option>
                                    </select>
                                </div>
                            </div>                         
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="cit_check5" class="col-form-label">เช็คการต่อพ่วง</label>
                                    <select class="form-control" wire:model="cit_check5" >
                                        <option value="1">/</option>
                                        <option value="0">X</option>
                                    </select>
                                </div>
                                <div class="col-6"> 
                                    <label for="cit_remark" class="col-form-label">หมายเหตุ</label>
                                    <input type="text" class="form-control" wire:model="cit_remark">
                                </div>                         
                            </div>
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

