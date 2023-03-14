<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">แผน PM คอมพิวเตอร์และอุปกรณ์ระบบคอมพิวเตอร์</h3>
                        </div>
                        <div class="col-4">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                            <a href="{{route('documentcontrolictplan.create')}}"
                            class="btn btn-primary w-sm waves-effect waves-light">
                            <i class="fas fa-plus"></i> เพิ่ม</a>                                                       
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>ปี</th>
                                    <th>ประเภท</th>
                                    <th>หมายเหตุ</th>
                                    <th>ผู้บันทึก</th>
                                    <th>ผู้ตรวจสอบ</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plans as $item)
                                <tr>
                                    <th>{{$item->year_name}}</th>
                                    <td>{{$item->planhd_type}}</td>
                                    <td>{{$item->planhd_remark}}</td>
                                    <td>{{$item->planhd_save}}</td>
                                    <td>{{$item->approval_save}}</td>
                                    <td>
                                        <a href="{{route('documentcontrolictplan.update',$item->id)}}"
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
                        {{$plans->links()}}
                    </div>                   
                </div>                
            </div>
        </div>
    </div>
</div>
