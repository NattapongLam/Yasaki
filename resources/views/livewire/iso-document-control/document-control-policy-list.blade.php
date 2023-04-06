<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h3 class="card-title">Policy</h3>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                                <a type="button" class="btn btn-primary w-sm waves-effect waves-light" href="{{route('policy.create')}}">
                                <i class="fas fa-plus"></i> เพิ่ม</a>                             
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
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pollist as $item)
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <td>{{\Carbon\Carbon::parse($item->pol_date)->format('d/m/Y')}}</td>
                                    <td><a href="{{asset($item->pol_file)}}">{{$item->pol_name}}</a>                                    
                                    </td>
                                    <td>                                        
                                        <a type="button" class="btn btn-sm btn-warning" href="{{route('policy.edit',$item->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$pollist->links()}}
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
                // imageHeight: 600,
                // imageWidth: 600,
                imageClass: 'img-fluid',
            })
        }
</script>

