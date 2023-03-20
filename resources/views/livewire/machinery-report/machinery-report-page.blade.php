<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">รายการซ่อมเครื่องจักรรอตรวจรับ</h3>                           
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                        <div class="col-3" style="text-align: right;">                            
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">สถานะ</th>                                    
                                    <th class="text-center">ประเภทงาน</th>
                                    <th>วันที่</th>
                                    <th>เครื่องจักร</th>                                  
                                    <th>แผนก</th>  
                                    <th>บริการ</th>     
                                    <th>อาการเสีย</th>                                      
                                    <th></th>                         
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcdoculist as $key => $item)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{route('machineryreport.end',$item->id)}}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>                                                                             
                                    </td>
                                    <td  class="text-center">
                                        @if ($item->sta_name == "รอดำเนินการ")
                                        <span class="badge bg-warning">รอดำเนินการ</span>
                                        @elseif($item->sta_name == "ยกเลิก")  
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @elseif($item->sta_name == "ดำเนินการแล้ว") 
                                        <span class="badge bg-success">ดำเนินการแล้ว</span>
                                        @elseif($item->sta_name == "ตรวจสอบแล้ว") 
                                        <span class="badge bg-info">ตรวจสอบแล้ว</span>
                                        @endif
                                    </td>                                     
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
                                        @livewire('machinery-report.machinery-report-form')
                                        <button type="button" class="btn btn-sm btn-warning" 
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="@mdo" 
                                        wire:click="$emit('editMachineryReport',{{$item->id}})">
                                        <i class="fas fa-child"></i>
                                        </button>
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