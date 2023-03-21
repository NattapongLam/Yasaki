<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายชื่อพนักงาน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <input class="form-control float-right" type="text" placeholder="ค้นหา"
                            aria-label="ค้นหา" wire:model="searchTerm">
                        </div>                        
                    </div><hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>ตำแหน่ง</th>
                                    <th></th>
                                </tr>                          
                            </thead>
                            <tbody>
                                @foreach ($emps as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->employee_code}}</td>
                                        <td>{{$item->employee_fullname}}</td>
                                        <td>{{$item->employee_job}}</td>
                                        <td>
                                            <button 
                                            type="button" 
                                            class="btn btn-info"
                                            wire:click.prevent="$emit('selectedEmp',{{$item->id}})">
                                            <i class="fas fa-check"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        {{$emps->links()}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
</div>

