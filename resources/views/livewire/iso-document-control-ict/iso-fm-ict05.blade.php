<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title">บันทึกการ PM และการแก้ไขคอมพิวเตอร์และอุปกรณ์ (YSK1-FM-ICT-05)</h3>
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
                                    <th>ลำดับ</th>
                                    <th>ชื่อเครื่อง</th>
                                    <th>สถานที่</th>
                                    <th>วันที่แก้ไข</th>
                                    <th>ประเภท</th>     
                                    <th>อาการ</th>   
                                    <th>สาเหตุ</th>    
                                    <th>อุปกรณ์ที่เปลี่ยน</th>                        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ictcomlist as $key => $item)
                                <tr>
                                    <th>{{$key+1}}</th>
                                    <td>{{$item->com_name}}</td>
                                    <td>{{$item->com_locat}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->cit_date)->format('d/m/Y')}}</td>
                                    <td>{{$item->cit_type}}</td>
                                    <td>{{$item->cit_note}}</td>
                                    <td>{{$item->cit_case}}</td>
                                    <td>{{$item->cit_remark}}</td>
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
