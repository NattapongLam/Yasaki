<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">ทะเบียนผู้ถือครอง (ASB)</h3>                           
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">วันที่ประกาศใช้</th>
                                    <th style="text-align: center">วันที่แจกจ่าย</th>
                                    <th style="text-align: center">ประเภทเอกสาร</th>
                                    <th>เอกสาร</th>                                  
                                    <th>หมานเหตุ</th>  
                                    <th style="text-align: center">สถานะ</th>                                                                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holder as $key => $item)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td style="text-align: center">{{$item->iso_doculist_forcedate}}</td>     
                                    <td style="text-align: center">{{$item->recipient_date}}</td>      
                                    <td style="text-align: center">{{$item->iso_docutype_code}}</td>    
                                    <td>
                                        <a href="images/isodocuments/{{$item->iso_doculist_filename}}">
                                        {{$item->iso_doculist_name}} ({{$item->iso_doculist_code}})
                                        </a>
                                    </td>   
                                    <td>{{$item->iso_docuholder_remark}}</td>        
                                    <td style="text-align: center">{{$item->iso_docuholder_status}}</td>                                            
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