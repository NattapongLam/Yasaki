<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">บัญชีรายชื่อคอมพิวเตอร์และอุปกรณ์ระบบคอมพิวเตอร์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">                       
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="gruo_code" class="col-form-label">ลำดับ</label>
                                        <input type="text" class="form-control" wire:model="com_listno" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="gruo_name" class="col-form-label">ชื่อเครื่อง</label>
                                        <input type="text" class="form-control" wire:model="com_name">
                                    </div>
                                </div>                                
                            </div>                     
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="gruo_name" class="col-form-label">IP ADDRESS</label>
                                    <input type="text" class="form-control" wire:model="com_ip" readonly>
                                </div>
                                <div class="col-6">
                                    <label for="gruo_name" class="col-form-label">ที่ตั้ง</label>
                                    <input type="text" class="form-control" wire:model="com_locat">
                                </div>
                            </div>
                          
                        </div>
                        <div class="mb-3">
                            <label for="gruo_name" class="col-form-label">รุ่น/คุณลักษณะพื้นฐาน</label>
                            <input type="text" class="form-control" wire:model="com_desc">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="gruo_name" class="col-form-label">ผู้ใช้งาน</label>
                                    <input type="text" class="form-control" wire:model="com_users">
                                </div>
                                <div class="col-6">
                                    <label for="gruo_name" class="col-form-label">สถานะ</label>
                                    <select class="form-control" wire:model="com_status">
                                        <option value="ใช้งาน">ใช้งาน</option>
                                        <option value="ไม่ใช้งาน">ไม่ใช้งาน</option>
                                    </select>
                                </div>
                            </div>                           
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="gruo_name" class="col-form-label">ประเภท</label>
                                    <select class="form-control" wire:model="com_type">
                                        <option value="อุปรกรณ์/Router">อุปรกรณ์/Router</option>
                                        <option value="อุปรกรณ์/Switch">อุปรกรณ์/Switch</option>
                                        <option value="คอมพิวเตอร์">คอมพิวเตอร์</option>
                                        <option value="AccessPoint">AccessPoint</option>
                                        <option value="Printer">Printer</option>
                                        <option value="NAS">NAS</option>
                                        <option value="SERVER">SERVER</option>
                                        <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="gruo_name" class="col-form-label">OS</label>
                                    <input type="text" class="form-control" wire:model="com_os">
                                </div>
                            </div>                          
                        </div>
                        <div class="mb-3">
                            <label for="gruo_name" class="col-form-label">หมายเหตุ</label>
                            <input type="text" class="form-control" wire:model="com_ramrk">
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

