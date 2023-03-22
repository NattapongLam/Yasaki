<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">รายชื่อพนักงาน</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                                    <div class="vr"></div>
                                    @livewire('employee-list.employee-list-form')
                                    <button type="button" class="btn btn-primary w-sm waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('btnCreateEmployeeList')">
                                    <i class="fas fa-plus"></i> เพิ่ม</button>                             
                                </div>                         
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รูปภาพ</th>
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>บริษัท</th>
                                    <th>แผนก</th>
                                    <th>ตำแหน่ง</th>
                                    <th class="text-center">เพศ</th>
                                    <th class="text-center">สถานะ</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emplist as $key => $item)
                                <tr>
                                    <th>{{$key + 1}}</th>
                                    <td><img class="img-thumbnail" alt="100x100" width="100" src="assets/images/users/{{$item->employee_image}}" data-holder-rendered="true"></td>
                                    <td>{{$item->employee_code}}</td>
                                    <td>{{$item->employee_fullname}}</td>
                                    <td>{{$item->employee_company}}</td>
                                    <td>{{$item->department_name}}</td>
                                    <td>{{$item->employee_job}}</td>
                                    <td class="text-center">
                                        @if($item->employee_sex == "M")
                                        <span class="badge bg-primary">ชาย</span>
                                        @else
                                        <span class="badge bg-info">หญิง</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->employee_status)
                                        <span class="badge bg-success">เป็นพนักงาน</span>
                                        @else
                                        <span class="badge bg-danger">ลาออก</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editEmployeeList',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$emplist->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
