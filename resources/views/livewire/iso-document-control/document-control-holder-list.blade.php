<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">ทะเบียนผู้ถือครองเอกสาร</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                <a href="#" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">สถานะ</th>
                                    <th style="text-align: center">วันที่จ่ายเอกสาร</th>
                                    <th style="text-align: center">ผู้รับเอกสาร</th>
                                    <th style="text-align: center">วันที่รับคืนเอกสาร</th>
                                    <th style="text-align: center">ผู้รับคืนเอกสาร</th>
                                    <th style="text-align: center">แผนก</th>
                                    <th style="text-align: center">ประเภทเอกสาร</th>
                                    <th>เอกสาร</th>                                   
                                    <th>หมายเหตุ</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($isohold as $key => $item)
                                <tr>
                                    <th>{{$key+1}}</th>
                                    <td class="text-center">
                                        @if($item->iso_docuholder_status == "รับทราบ")
                                        <span class="badge bg-success">รับทราบ</span>
                                        @elseif($item->iso_docuholder_status == "รอดำเนินการ")
                                        <span class="badge bg-warning">รอดำเนินการ</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{$item->recipient_date}}</td>
                                    <td class="text-center">{{$item->recipient_person}}</td>
                                    <td class="text-center">{{$item->return_date}}</td>
                                    <td class="text-center">{{$item->return_person}}</td>
                                    <td class="text-center">{{$item->emp_department_refcode}}</td>
                                    <td class="text-center">{{$item->iso_docutype_code}}</td>
                                    <td>{{$item->iso_doculist_code}}/{{$item->iso_doculist_name}}</td>                                                                      
                                    <td>{{$item->iso_docuholder_remark}}</td>
                                    <td>
                                        <a href="#"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                        </a>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                       {{$isohold->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>