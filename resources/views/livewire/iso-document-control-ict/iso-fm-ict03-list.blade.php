<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">ใบขอใช้บริการ ICT</h3>
                        </div>
                        <div class="col-4">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                            <a type="button" class="btn btn-primary w-sm waves-effect waves-light" href="{{route('ict-03.create')}}">
                            <i class="fas fa-plus"></i> เพิ่ม</a>                           
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ประเภท</th>
                                    <th>ชื่อเครื่อง</th>
                                    <th>แผนก</th>
                                    <th>อาการเสีย</th>
                                    <th>วันที่ปิดงาน</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ictcomlist as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->serv_type}}</td>
                                    <td>{{$item->serv_com}}</td>
                                    <td>{{$item->serv_dep}}</td>
                                    <td>{{$item->serv_remark}} ({{$item->serv_case}})</td>
                                    <td>{{$item->closeit_date}}</td>
                                    <td>
                                        <a type="button" class="btn btn-sm btn-warning" href="{{route('ict-03.edit',$item->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$ictcomlist->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
