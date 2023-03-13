<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">บัญชีแม่บทเอกสาร (YSK1-FM-DCC-02)</h3>
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
                                    <th>วันที่ขึ้นทะเบียน</th>
                                    <th>วันที่บังคับใช้</th>
                                    <th>ระบบมาตรฐาน</th>
                                    <th>ประเภทเอกสาร</th>
                                    <th>ชื่อเอกสาร</th>
                                    <th>ผู้รับผิดชอบ</th>
                                    <th>หมายเหตุ</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($isodocs as $key => $item)
                                <tr>
                                    <th>{{$key+1}}</th>
                                    <td>{{$item->iso_doculist_date}}</td>
                                    <td>{{$item->iso_doculist_forcedate}}</td>
                                    <td>{{$item->iso_docugroup_name}}</td>
                                    <td>{{$item->iso_docutype_code}}</td>
                                    <td>
                                        <a href="images/isodocuments/{{$item->iso_doculist_filename}}">{{$item->iso_doculist_code}}/{{$item->iso_doculist_name}}</a>
                                    </td>
                                    <td>{{$item->emp_department_refcode}}</td>
                                    <td>{{$item->iso_docustatus_reamrk}}</td>
                                    <td>
                                        <a href="#"
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
                        <div class="col-9">{{$isodocs->links()}}</div>
                        <div class="col-3" style="text-align:right;">R.02.20230313</div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>