<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">อนุมัติใบลา</h3>
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th style="text-align: center">รูปพนักงาน</th>
                                    <th>พนักงาน</th>
                                    <th>รายละเอียด</th>
                                    <th>ประเภท</th>
                                    <th>วันที่ลา</th>
                                    <th style="text-align: center">เอกสารแนบ</th>
                                    <th>อนุมัติ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doc as $item)
                                <tr>
                                    <td style="text-align: center">
                                        <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/users/'.$item->employee_image}}')">
                                            <img class="img-thumbnail" alt="100x100" width="100" src="/assets/images/users/{{$item->employee_image}}">
                                        </button>                                       
                                    </td>
                                    <td>{{$item->employee_fullname}}/{{$item->employee_code}} ( {{$item->department_name}} )</td>
                                    <td>{{$item->ldoc_reamrk}}</td>
                                    <td>{{$item->leav_name}}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($item->ldoc_datestart)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($item->ldoc_dateend)->format('d/m/Y')}}
                                        ( {{$item->ltype_name}} )
                                    </td>
                                    <td class="text-center">
                                        <button type="button" style="border:none;" onclick="previewAttach('{{'images/leavedocs/'.$item->ldoc_fileup}}')">
                                            <img class="img-thumbnail"  width="70px" src="{{URL::asset('images/leavedocs/'.$item->ldoc_fileup)}}"data-holder-rendered="true">
                                        </button>                   
                                    </td>
                                    <td>    
                                        @livewire('leave-docuno-approval.leave-docuno-approval-form')                                    
                                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editLeaveApproval',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    previewAttach = (path) => {
            Swal.fire({
                imageUrl: `{{ asset('${path}') }}`,
                imageHeight: 350,
                imageWidth: 350,
                imageClass: 'img-responsive rounded-circle',
            })
        }
</script>
