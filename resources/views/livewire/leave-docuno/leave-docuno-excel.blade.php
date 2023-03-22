<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="importExcel">
                <div class="row">
                    <div class="col-3"><h3 class="card-title">ฟอร์มนำเข้าข้อมูลการลา</h3></div>
                    <div class="col-6"> 
                        <input type="file" class="form-control" required wire:model="excel"><br>                      
                    </div>
                    <div class="col-3">
                            <button class="btn btn-info btn-flat">นำเข้า</button>
                    </div>
                </div> 
            </form>           
        </div>      
    </div>
</div>
