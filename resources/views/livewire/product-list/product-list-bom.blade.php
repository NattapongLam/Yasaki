<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียด
                        <input type="hidden" class="form-control" wire:model="code" readonly>
                    </h5>                   
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    <div class="row">
                        @foreach ($dt as $item)
                        <div class="col-xl-12 col-sm-12">
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
                                            <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">{{$item->bom_rm_pdcode}}</a></h5>                                               
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
                                        {{-- <li class="list-inline-item me-3">
                                            <span class="badge bg-danger">ยอดจอง : {{number_format($item->ReserveQty,2)}}</span>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>                                           
                        @endforeach
                    </div>
                    </div>                                                              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
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
