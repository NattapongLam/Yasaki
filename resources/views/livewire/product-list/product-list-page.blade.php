<div>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <h3 class="card-title">สินค้าสำเร็จรูป</h3>
                            </div>
                            <div class="col-3"></div>
                            <div class="col-6">   
                                <div class="hstack gap-3">
                                    <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                        aria-label="ค้นหา" wire:model="searchTerm">     
                                </div>     
                            </div>                
                        </div><hr>    
                        <div class="row">
                            @foreach ($pd as $key => $item)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-4">
                                                <div class="avatar-md">
                                                    <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                        <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName1}}')">
                                                        <img src="assets/images/product/{{$item->PicFileName1}}" alt="" height="70">
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>                                        
                                            <div class="flex-grow-1 overflow-hidden">
                                                @livewire('product-list.product-list-bom')
                                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editListBom',{{$item->id}})">
                                                <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">{{$item->Code}}</a></h5>      
                                                </button>                                         
                                                <p class="text-muted mb-4">{{$item->Name1}}</p>
                                                <div class="avatar-group">
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName2}}')">
                                                            <img src="assets/images/product/{{$item->PicFileName2}}" alt="" class="rounded-circle avatar-xs">
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName3}}')">
                                                            <img src="assets/images/product/{{$item->PicFileName3}}" alt="" class="rounded-circle avatar-xs">
                                                            </button>
                                                        </a>
                                                    </div>
                                                    <div class="avatar-group-item">
                                                        <a href="javascript: void(0);" class="d-inline-block">
                                                            <button type="button" style="border:none;" onclick="previewAttach('{{'assets/images/product/'.$item->PicFileName4}}')">
                                                            <img src="assets/images/product/{{$item->PicFileName4}}" alt="" class="rounded-circle avatar-xs">
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top">
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-success">สต็อค : {{number_format($item->StockQty,2)}}</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-warning">ค้างรับ : {{number_format($item->RemainInQty,2)}}</span>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <span class="badge bg-danger">ยอดจอง : {{number_format($item->ReserveQty,2)}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>                                                  
                        <hr>
                        <div class="row">
                            {{$pd->links()}}
                        </div>
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
                imageHeight: 350,
                imageWidth: 350,
                imageClass: 'img-responsive rounded-circle',
            })
        }
</script>
