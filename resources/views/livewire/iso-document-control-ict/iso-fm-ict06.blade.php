<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">ประวัติอุปกรณ์คอมพิวเตอร์ (YSK1-FM-ICT-06)</h3>
                        </div>
                        <div class="col-4">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                                @livewire('iso-document-control-ict.iso-fm-ict06-list')                                                     
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>IP ADDRESS</th>
                                    <th>ชื่อเครื่อง</th>
                                    <th class="text-center">สถานะ</th>
                                    <th>สถานที่</th>
                                    <th>ผู้ใช้</th>
                                    <th>ประเภท</th>
                                    <th>ดู</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ictcomlist as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->com_ip}}</td>
                                    <td>{{$item->com_name}} - {{$item->com_desc}}</td>
                                    <td class="text-center">
                                        @if($item->com_status == "ใช้งาน")
                                        <span class="badge bg-success">ใช้งาน</span>
                                        @else
                                        <span class="badge bg-danger">ไม่ใช้งาน</span>
                                        @endif
                                    </td>
                                    <td>{{$item->com_locat}}</td>
                                    <td>{{$item->com_users}}</td>
                                    <td>{{$item->com_type}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editDocumentControlIct',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$ictcomlist->links()}}
                    </div>
                    <div class="row">
                        <div class="col-11"></div>
                        <div class="col-1"><p>R.00-20220318</p></div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
