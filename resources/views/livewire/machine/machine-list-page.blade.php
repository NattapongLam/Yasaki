<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">เครื่องจักร</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                <a href="{{route('machine.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสกเครื่อง</th>
                                    <th>ชื่อเครื่อง</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ใช้ผลิต</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($machines as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->mc_code}}</td>
                                    <td>{{$item->mc_name}} ({{$item->machinegroup->gruo_name}})</td>
                                    <td class="text-center">
                                        @if($item->mc_status)
                                        <span class="badge bg-success">ใช้งาน</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->mc_pdt)
                                        <span class="badge bg-success">ใช้</span>
                                        @else
                                        <span class="badge bg-danger">ไม่ใช้</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('machine.update',$item->id)}}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                        </a>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$machines->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>