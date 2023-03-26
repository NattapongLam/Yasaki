<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">KPI ICT</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                @livewire('iso-document-control-ict.iso-itkpi-form')
                                <button type="button" class="btn btn-primary w-sm waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('btnCreateItkpi')">
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
                                    <th>รายละเอียด</th>
                                    <th class="text-center">ไฟล์</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kpilist as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{$item->kpi_date}}</td>
                                    <td>{{$item->kpi_name}}</td>
                                    <td class="text-center">     
                                        <button type="button" style="border:none;" onclick="previewAttach('{{('images/kpifiles/'.$item->kpi_file)}}')" href="#">
                                            <img class="img-thumbnail"  width="70px" src="{{URL::asset('images/kpifiles/'.$item->kpi_file)}}"data-holder-rendered="true">
                                        </button>                                   
                                    </td>
                                    <td>                                        
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editItkpi',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$kpilist->links()}}
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

