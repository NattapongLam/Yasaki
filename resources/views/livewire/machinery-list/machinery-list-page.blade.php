<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">แจ้งซ่อมเครื่องจักร</h3>
                            <a href="{{route('machine.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่มรายการแจ้งซ่อมเครื่องจักร</a>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ประเภทงาน</th>
                                    <th>วันที่</th>
                                    <th>เครื่องจักร</th>                                  
                                    <th>แผนก</th>  
                                    <th>บริการ</th>     
                                    <th>รายละเอียด</th>            
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcdoculist as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="text-center">{{$item->name}}</td>
                                    <td class="text-center">
                                        @if($item->machinery_hd_type == "PM")
                                        <span class="badge bg-success">PM</span>
                                        @else
                                        <span class="badge bg-danger">ด่วน</span>
                                        @endif
                                    </td>
                                    <td>{{$item->machinery_hd_date}}</td>
                                    <td>{{$item->ms_machine_code}} ({{$item->ms_machine_name}})</td>   
                                    <td>{{$item->department_name}}</td>    
                                    <td>{{$item->ms_machine_service_name}}</td>   
                                    <td>( {{$item->ms_machine_system_name}} ) : {{$item->machinery_hd_note}}</td>                              
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
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>