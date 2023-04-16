<div>
    <div class="row">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{ session('success') }}
            <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="mdi mdi-block-helper me-2"></i>
            {{ session('error') }}
            <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">แบบบันทึกการตรวจอุปกรณ์ป้องกันภัยส่วนบุคคล (PPE)</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                <a href="{{route('ppe-dep.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ปี</th>
                                    <th>เดือน</th>
                                    <th>แผนก</th>
                                    <th>หน้างานที่ทำ</th>
                                    <th>หัวหน้าแผนก</th>
                                    <th>ผู้จัดการฝ่าย</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ppe as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->year_name}}</td>
                                    <td>{{$item->month_name}}</td>
                                    <td>{{$item->department_name}}</td>
                                    <td>{{$item->job_desc}}</td>
                                    <td>{{$item->personsave}}</td>
                                    <td>{{$item->approvalsave}}</td>
                                    <td>
                                        <a href="{{route('ppe-dep.edit',$item->id)}}"
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
                        {{$ppe->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
