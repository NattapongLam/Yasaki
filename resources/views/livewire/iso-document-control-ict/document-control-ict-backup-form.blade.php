<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายการตรวจสอบอุปกรณ์ TAP Backup ภายในห้อง SERVER</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="gruo_code" class="col-form-label">ปี</label>
                            <input type="text" class="form-control" wire:model="year_name">
                        </div>
                        <div class="mb-3">
                            <label for="gruo_name" class="col-form-label">เดือน</label>
                            <input type="text" class="form-control" wire:model="month_id">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">01</label>
                                    <select class="form-control" wire:model="ck_day01">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">02</label>
                                    <select class="form-control" wire:model="ck_day02">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">03</label>
                                    <select class="form-control" wire:model="ck_day03">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">04</label>
                                    <select class="form-control" wire:model="ck_day04">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">05</label>
                                    <select class="form-control" wire:model="ck_day05">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">06</label>
                                    <select class="form-control" wire:model="ck_day06">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">07</label>
                                    <select class="form-control" wire:model="ck_day07">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">08</label>
                                    <select class="form-control" wire:model="ck_day08">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">09</label>
                                    <select class="form-control" wire:model="ck_day09">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">10</label>
                                    <select class="form-control" wire:model="ck_day10">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">11</label>
                                    <select class="form-control" wire:model="ck_day11">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">12</label>
                                    <select class="form-control" wire:model="ck_day12">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">13</label>
                                    <select class="form-control" wire:model="ck_day13">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">14</label>
                                    <select class="form-control" wire:model="ck_day14">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">15</label>
                                    <select class="form-control" wire:model="ck_day15">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">16</label>
                                    <select class="form-control" wire:model="ck_day16">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">17</label>
                                    <select class="form-control" wire:model="ck_day17">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">18</label>
                                    <select class="form-control" wire:model="ck_day18">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">19</label>
                                    <select class="form-control" wire:model="ck_day19">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">20</label>
                                    <select class="form-control" wire:model="ck_day20">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">21</label>
                                    <select class="form-control" wire:model="ck_day21">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">22</label>
                                    <select class="form-control" wire:model="ck_day22">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">23</label>
                                    <select class="form-control" wire:model="ck_day23">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">24</label>
                                    <select class="form-control" wire:model="ck_day24">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">25</label>
                                    <select class="form-control" wire:model="ck_day25">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">26</label>
                                    <select class="form-control" wire:model="ck_day26">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">27</label>
                                    <select class="form-control" wire:model="ck_day27">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">28</label>
                                    <select class="form-control" wire:model="ck_day28">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">29</label>
                                    <select class="form-control" wire:model="ck_day29">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">30</label>
                                    <select class="form-control" wire:model="ck_day30">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
                                </div>
                            </div>                            
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <label for="message-text" class="col-form-label text-center">31</label>
                                    <select class="form-control" wire:model="ck_day31">
                                    <option option value="ป">ปกติ</option>
                                    <option value="ผ">ผิดปกติ</option>
                                    <option value="ก">แก้ไข</option>
                                    <option value="">ว่าง</option>
                                    </select>
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