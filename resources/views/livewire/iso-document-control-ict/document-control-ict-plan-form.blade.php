<div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">แผน PM คอมพิวเตอร์และอุปกรณ์ระบบคอมพิวเตอร์ (YSK1-FM-ICT-02)</h3>
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="year_name" class="col-form-label">ปี</label>
                        <input type="text" name="year_name" id="year_name" placeholder="ระบุปี (2023)" wire:model="year_name"
                        class="form-control @error('year_name') is-invalid @enderror">
                        @error('year_name')
                        <div id="year_name_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="planhd_type" class="col-form-label">ประเภท</label>
                        <select name="planhd_type" id="planhd_type" wire:model="planhd_type"
                        class="form-control select2-search-disable @error('planhd_type') is-invalid @enderror">                       
                        <option value="">-- กรุณาเลือกประเภท --</option>
                        <option value="Server">Server</option>
                        <option value="Computer">Computer</option>
                        </select>
                        @error('planhd_type')
                        <div id="planhd_type_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                        <label for="planhd_remark" class="col-form-label">หมายเหตุ</label>
                        <textarea class="form-control" name="planhd_remark" id="planhd_remark" wire:model="planhd_remark"></textarea>
                        </div>
                    </div><hr>              
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap w-100 text-center">
                            <thead>
                                <tr style="background-color:#ddddddce">

                                </tr>
                                {{-- <th>ลำดับ</th> --}}
                                <th>ชื่อเครื่อง</th>
                                <th>สถานที่</th>
                                <th>P-01</th>
                                <th>A-01</th>
                                <th>P-02</th>
                                <th>A-02</th>
                                <th>P-03</th>
                                <th>A-03</th>
                                <th>P-04</th>
                                <th>A-04</th>
                                <th>P-05</th>
                                <th>A-05</th>
                                <th>P-06</th>
                                <th>A-06</th>
                                <th>P-07</th>
                                <th>A-07</th>
                                <th>P-08</th>
                                <th>A-08</th>
                                <th>P-09</th>
                                <th>A-09</th>
                                <th>P-10</th>
                                <th>A-10</th>
                                <th>P-11</th>
                                <th>A-11</th>
                                <th>P-12</th>
                                <th>A-12</th>
                                <th>หมายเหตุ</th>
                                <th>
                                    @livewire('iso-document-control-ict.document-control-ict-computer-list')
                                    <button type="button" 
                                    class="btn btn-success waves-effect waves-light"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal"
                                    data-bs-whatever="@mdo" wire:click="$emit('btnCreateDocumentControlIctBackup')">
                                    <i class="fas fa-plus"></i></button>
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($coms as $key => $item)
                                <tr style="background-color:#F8F8FF">
                                    {{-- <td>{{$key+1}}</td> --}}
                                    <td>
                                        {{$item['plandt_comname']}} 
                                        <input type="hidden" value="{{$item['com_id']}}" name="com_id[]">
                                    </td>
                                    <td>{{$item['plandt_comlocat']}}</td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check01[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check01">
                                        </div>                                   
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action01[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action01">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check02[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check02">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action02[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action02">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check03[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check03">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action03[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action03">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check04[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check04">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action04[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action04">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check05[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check05">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action05[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action05">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check06[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check06">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action06[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action06">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check07[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check07">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action07[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action07">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check08[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check08">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action08[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action08">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check09[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check09">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action09[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action09">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check10[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check10">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action10[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action10">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check11[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check11">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action11[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action11">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_check12[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_check12">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-check-input" type="checkbox" id="formCheck2"
                                            name="plandt_action12[]" value="1" checked 
                                            wire:model="coms.{{$key}}.plandt_action12">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text"
                                            name="plandt_reamrk[]"  value=""
                                            wire:model="coms.{{$key}}.plandt_reamrk">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" wire:click.prevent="deleteRow({{$key}})">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>  <br>            
            </form>    
            <div class="row">
                <div class="col-11"></div>
                <div class="col-1"><p>R.01-20230311</p></div>
            </div>       
        </div>      
    </div>
</div>

