<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">รายชื่อแผนก</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                @livewire('department-list.department-list-form')
                                <button type="button" class="btn btn-primary w-sm waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('btnCreateDepartment')">
                                <i class="fas fa-plus"></i> เพิ่ม</button>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสแผนก</th>
                                    <th>ชื่อแผนก</th>
                                    <th class="text-center">สถานะ</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deplist as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->department_code}}</td>
                                    <td>{{$item->department_name}}</td>
                                    <td class="text-center">
                                        @if($item->department_status)
                                        <span class="badge bg-success">ใช้งาน</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editDepartment',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$deplist->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
