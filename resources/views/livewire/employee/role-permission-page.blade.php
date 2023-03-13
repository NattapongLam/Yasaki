<div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">ฟอร์มสิทธิ์</h3>
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                        <label for="role" class="col-form-label">ระดับ</label>
                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" wire:model="role">
                        <option value="">กรุณาเลือกระดับ</option>
                        @foreach ($roles as $item)
                        <option value="{{$item->name}}">                           
                            {{$item->name}}                       
                        </option>
                        @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="permission" class="col-form-label">เมนู</label>
                            <div class="row">
                                @foreach ($permissions as $key => $item)
                                <div class="col-2 form-check mb-2">
                                    <input class="form-check-input" type="checkbox" wire:model="permission.{{$key}}" id="formCheck1 {{$item->id}}" value="{{$item->name}}">
                                    <label class="form-check-label" for="formCheck1 {{$item->id}}">{{$item->menu_name}}</label>
                                </div>                           
                            @endforeach 
                            </div>                                                     
                        </div>
                    </div><hr>
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>
            </form>           
        </div>      
    </div>
</div>
