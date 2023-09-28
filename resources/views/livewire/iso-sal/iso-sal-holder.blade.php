<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">ทะเบียนผู้ถือครอง (SAL)</h3>                           
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">สถานะ</th>   
                                    <th style="text-align: center">วันที่แจกจ่าย</th>
                                    <th style="text-align: center">ประเภทเอกสาร</th>
                                    <th>เอกสาร</th>                                  
                                    <th>หมายเหตุ</th> 
                                    <th></th> 
                                                                                                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holder as $key => $item)
                                <tr>
                                    <td style="text-align: center">
                                        @if($item->iso_docuholder_status == "รับทราบ")
                                        <span class="badge bg-success">รับทราบ</span>
                                        @elseif($item->iso_docuholder_status == "รอดำเนินการ")
                                        <span class="badge bg-warning">รอดำเนินการ</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>      
                                    <td style="text-align: center">{{\Carbon\Carbon::parse($item->recipient_date)->format('d/m/Y')}}</td>        
                                    <td style="text-align: center">{{$item->iso_docutype_code}}</td>    
                                    <td>
                                        <a href="images/isodocuments/{{$item->iso_doculist_filename}}" target=”_blank”>
                                        {{$item->iso_doculist_name}} ({{$item->iso_doculist_code}})
                                        </a>
                                    </td>   
                                    <td>{{$item->iso_docuholder_remark}}</td>        
                                    <td>
                                        @livewire('iso-sal.iso-sal-holder-form')
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editSalHolder',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
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
    </div><hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">แผนภูมิเต่า && ความเสี่ยง</h3>                           
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">วันที่</th>
                                    <th style="text-align: center">ประเภทเอกสาร</th>
                                    <th style="text-align: center">เอกสาร</th>
                                                                                                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($policy as $key => $item)
                                <tr>                                     
                                    <td style="text-align: center">{{\Carbon\Carbon::parse($item->pol_date)->format('d/m/Y')}}</td>        
                                    <td>{{$item->pol_type}}</td>    
                                    <td>
                                        <a href="images/isopolicy/{{$item->pol_filename}}" target=”_blank”>
                                        {{$item->pol_name}}
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
    </div><hr>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">KPI</h3>                           
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="tb_job" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center">วันที่</th>
                                    <th style="text-align: center">เอกสาร</th>
                                                                                                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kpi as $key => $item)
                                <tr>                                     
                                    <td style="text-align: center">{{\Carbon\Carbon::parse($item->kpi_date)->format('d/m/Y')}}</td>         
                                    <td>
                                        <a href="images/kpifiles/{{$item->kpi_filename}}" target=”_blank”>
                                        {{$item->kpi_name}}
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