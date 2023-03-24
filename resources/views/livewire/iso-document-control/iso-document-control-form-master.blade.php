<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">บัญชีแม่บทเอกสาร</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>                        
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th class="text-center">สถานะ</th>
                                    {{-- <th>วันที่ขึ้นทะเบียน</th> --}}
                                    <th class="text-center">วันที่</th>
                                    <th class="text-center">ระบบมาตรฐาน</th>
                                    <th class="text-center">ประเภท</th>
                                    <th>ชื่อเอกสาร</th>
                                    <th>แผนก</th>
                                    <th>หมายเหตุ</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($isodocs as $key => $item)
                                <tr>
                                    {{-- <th>{{$item->iso_doculist_listno}}</th> --}}
                                    <td class="text-center">
                                        @if($item->iso_docustatus_name == "ใหม่")
                                        <span class="badge bg-success">ใหม่</span>
                                        @elseif($item->iso_docustatus_name == "แก้ไข")
                                        <span class="badge bg-warning">แก้ไข</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>
                                    {{-- <td class="text-center">{{$item->iso_doculist_date}}</td> --}}
                                    <td class="text-center">{{\Carbon\Carbon::parse($item->iso_doculist_forcedate)->format('d/m/Y')}}</td>
                                    <td class="text-center">{{$item->iso_docugroup_name}}</td>
                                    <td class="text-center">{{$item->iso_docutype_code}}</td>
                                    <td>
                                        <a href="images/isodocuments/{{$item->iso_doculist_filename}}">{{$item->iso_doculist_code}}/{{$item->iso_doculist_name}}</a>
                                    </td>
                                    <td class="text-center">{{$item->emp_department_refcode}}</td>
                                    <td>{{$item->iso_docustatus_reamrk}}</td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        <div class="col-9">{{$isodocs->links()}}</div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
