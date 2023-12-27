<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ประวัติอุปกรณ์คอมพิวเตอร์  <input type="text" class="form-control" wire:model="com_name" readonly></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">  
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th class="text-center">ทำความสะอาดแป้นพิมพ์</th>
                                <th class="text-center">เป่าฝุ่นภายใน</th>
                                <th class="text-center">เช็คการต่อพ่วง</th>
                                <th class="text-center">การสแกนไวรัส</th>
                                <th class="text-center">ล้างข้อมูลไม่จำเป็น</th>
                            </tr>                                   
                        </thead>                     
                        <tbody>
                            @foreach ($dt as $item)
                            <tr>                               
                                <td>{{\Carbon\Carbon::parse($item->cit_date)->format('d/m/Y')}}</td>
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
                            </tr>
                            @endforeach
                        </tbody>                      
                    </table>                   
                </div>
            </div>
        </div>
    </div>
</div>
