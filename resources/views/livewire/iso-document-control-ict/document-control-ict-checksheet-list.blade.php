<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">CheckSheet การบำรุงรักษาคอมพิวเตอร์และอุปกรณ์ (YSK1-FM-ICT-04)</h3>
                        </div>
                        <div class="col-4">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                            <a href="{{route('documentcontrolictcheck.excel')}}" class="btn btn-info w-sm waves-effect waves-light">
                                <i class="fas fa-file-excel"></i> Excel</a>
                            @livewire('iso-document-control-ict.document-control-ict-checksheet-form')
                            <button type="button" class="btn btn-primary w-sm waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" 
                            wire:click="$emit('btnCreateIctChecksheet')">
                            <i class="fas fa-plus"></i> เพิ่ม</button>                           
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>วันที่</th>
                                    <th>ชื่อเครื่อง</th>
                                    <th class="text-center">ทำความสะอาดแป้นพิมพ์</th>
                                    <th class="text-center">เป่าฝุ่นภายใน</th>
                                    <th class="text-center">เช็คการต่อพ่วง</th>
                                    <th class="text-center">การสแกนไวรัส</th>
                                    <th class="text-center">ล้างข้อมูลไม่จำเป็น</th>
                                    <th>ผู้ดำเนิการ</th>
                                    <th>ผู้ตรวจสอบ</th>
                                    <th>หมายเหตุ</th>
                                    <th></th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itchecklist as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->cit_date}}</td>
                                    <td>{{$item->com_name}}</td>
                                    <td class="text-center">
                                        @if($item->cit_check1)
                                        <span class="badge bg-success">/</span>
                                        @else
                                        <span class="badge bg-danger">X</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->cit_check2)
                                        <span class="badge bg-success">/</span>
                                        @else
                                        <span class="badge bg-danger">X</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->cit_check3)
                                        <span class="badge bg-success">/</span>
                                        @else
                                        <span class="badge bg-danger">X</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->cit_check4)
                                        <span class="badge bg-success">/</span>
                                        @else
                                        <span class="badge bg-danger">X</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->cit_check5)
                                        <span class="badge bg-success">/</span>
                                        @else
                                        <span class="badge bg-danger">X</span>
                                        @endif
                                    </td>
                                    <td>{{$item->cit_save}}</td>
                                    <td>{{$item->cit_approval}}</td>
                                    <td>{{$item->cit_remark}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editIctChecksheet',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$itchecklist->links()}}
                    </div>
                    <div class="row">
                        <div class="col-11"></div>
                        <div class="col-1"><p>R.01-20230323</p></div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
