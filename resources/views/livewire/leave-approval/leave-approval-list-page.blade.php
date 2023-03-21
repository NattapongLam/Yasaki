<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">ตั้งค่าสายอนุมัติ</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                            <a href="{{route('leaveapproval.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">สถานะ</th>
                                    <th>รหัส</th>
                                    <th>ชื่อ</th>
                                    <th>หมายเหตุ</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leavhd as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td class="text-center">
                                        @if($item->leavapp_status)
                                        <span class="badge bg-success">ใช้งาน</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>
                                    <td>{{$item->leavapp_code}}</td>
                                    <td>{{$item->leavapp_name}}</td>
                                    <td>{{$item->leavapp_remark}}</td>
                                    <td>                                        
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editMachineGroup',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$leavhd->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
