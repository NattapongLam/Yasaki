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
                        <div class="col-6">
                            <h3 class="card-title">ประเมินความเสี่ยงด้านคุณภาพ ISO 9001</h3>
                        </div>
                        <div class="col-6">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            {{-- <div class="vr"></div>
                                <a type="button" class="btn btn-primary w-sm waves-effect waves-light" href="{{route('policy.create')}}">
                                <i class="fas fa-plus"></i> เพิ่ม</a>                             
                            </div>      --}}
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>วันที่ประกาศ</th>
                                    <th>ชื่อประกาศ</th>
                                    {{-- <th>แก้ไข</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pollist as $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->pol_date)->format('d/m/Y')}}</td>
                                    <td><a href="images/isopolicy/{{$item->pol_filename}}" target=”_blank”>{{$item->pol_name}}</a>                                    
                                    </td>
                                    {{-- <td>                                        
                                        <a type="button" class="btn btn-sm btn-warning" href="{{route('policy.edit',$item->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>                                      
                                    </td> --}}
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
@push('scriptjs')
<script>
 
</script>
@endpush

