<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            <h3 class="card-title">บันทึกการลา</h3>
                        </div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                            <a href="{{route('leavedocuno.create')}}" class="btn btn-primary w-sm waves-effect waves-light"><i class="fas fa-plus"></i> เพิ่ม</a>      
                            @auth
                                @if(auth()->user()->type == "Admin" || auth()->user()->type == "HR")
                                    <a href="{{route('leavedocuno.excel')}}" class="btn btn-info w-sm waves-effect waves-light">
                                    <i class="fas fa-file-excel"></i> Excel</a>
                                @else                          
                                @endif
                            @endauth                           
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
                                    <th>ประเภท</th>
                                    <th>พนักงาน</th>
                                    <th>หมายเหตุ</th>
                                    <th class="text-center">รูปแนบ</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leavdoc as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td class="text-center">
                                        @if($item->lsta_name == "ขออนุมัติ")
                                        <span class="badge bg-warning">ขออนุมัติ</span>
                                        @elseif($item->lsta_name == "อนุมัติ")
                                        <span class="badge bg-success">อนุมัติ</span>
                                        @else
                                        <span class="badge bg-danger">ยกเลิก/ไม่อนุมัติ</span>
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($item->ldoc_datestart)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item->ldoc_dateend)->format('d/m/Y')}} {{$item->leav_name}}</td>
                                    <td>{{$item->leav_name}}</td>
                                    <td>{{$item->employee_fullname}} ({{$item->employee_code}})</td>
                                    <td>{{$item->ldoc_reamrk}}</td>
                                    <td class="text-center">
                                        <button type="button" style="border:none;" onclick="previewAttach('{{('images/leavedocs/'.$item->ldoc_fileup)}}')" href="#">
                                            <img class="img-thumbnail"  width="70px" src="{{URL::asset('images/leavedocs/'.$item->ldoc_fileup)}}"data-holder-rendered="true">
                                        </button>                   
                                    </td>
                                    <td>
                                        @if($item->lsta_id == 1)                                        
                                        <a href="{{route('leavedocuno.update',$item->id)}}"
                                            class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        @endif                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$leavdoc->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    previewAttach = (path) => {
            Swal.fire({
                imageUrl: `{{ asset('${path}') }}`,
                imageHeight: 600,
                imageWidth: 600,
                imageClass: 'img-responsive rounded-circle',
            })
        }
</script>


