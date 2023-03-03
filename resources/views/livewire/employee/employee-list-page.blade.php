<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">พนักงาน</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                <a href="{{route('employee.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">รูป</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>ประเภท</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td class="text-center">
                                        @if($item->avatar)
                                        <img src="{{asset('/images/employees/'.$item->avatar)}}" class="rounded avatar-md">
                                        @endif
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>
                                        <a href="{{route('employee.update',$item->id)}}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('employee.rloe.permission',$item->id)}}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-user"></i>
                                            </a>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$employees->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>