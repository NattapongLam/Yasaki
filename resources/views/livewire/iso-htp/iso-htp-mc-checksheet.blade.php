<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">ตรวจสอบเครื่องจักรประจำวัน (HTP)</h3>                           
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th>เลขที่</th>
                                    <th>เครื่องจักร</th>
                                    <th>ผู้ตรวจสอบ</th>                                  
                                    <th>หมานเหตุ</th> 
                                    <th style="text-align: center"></th>                                                                        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcchk as $key => $item)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td>{{$item->checksheetmc_hd_docuno}}</td>     
                                    <td>{{$item->ms_machine_name}} ({{$item->ms_machine_name}})</td>        
                                    <td>{{$item->checksheetmc_hd_save}}</td>        
                                    <td>{{$item->checksheetmc_hd_note}}</td>  
                                    <td class="text-center">
                                        <a href="{{route('mcchkhtp.edit',$item->id)}}"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
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

