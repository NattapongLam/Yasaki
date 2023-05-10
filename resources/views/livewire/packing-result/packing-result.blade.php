<div>
    <div class="row">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{ session('success') }}
            <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="mdi mdi-block-helper me-2"></i>
            {{ session('error') }}
            <button unit="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">บันทึกผลผลิตประจำวันแผนกแพ็คกิ้ง</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                <a href="{{route('pkgresult.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a> 
                                <a href="{{route('pkgresult.index')}}" class="btn btn-warning w-sm waves-effect waves-light"><i class="fas fa-edit"></i> อัพเดท</a>                             
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center">สถานะ</th>
                                    <th>วันที่</th>
                                    <th>รายละเอียด</th>
                                    <th>กำลังพลทั้งหมด</th>
                                    <th>กำลังพลที่มา</th>
                                    <th>กำลังพลที่ขาด</th>                              
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hd as $item)
                                <tr>
                                    <th>
                                        <a></a>
                                        {{$item->id}}
                                    </th>
                                    <td class="text-center">
                                        @if($item->pkgresult_status)
                                        <span class="badge bg-success">ใช้งาน</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($item->pkgresult_date)->format('d/m/Y')}}</td>
                                    <td>{{$item->pkgresult_remark}}</td>
                                    <td>{{number_format($item->pkgresult_empfull,2)}}</td>
                                    <td>{{number_format($item->pkgresult_empqty,2)}}</td>
                                    <td>{{number_format($item->pkgresult_empdel,2)}}</td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$hd->links()}}
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

