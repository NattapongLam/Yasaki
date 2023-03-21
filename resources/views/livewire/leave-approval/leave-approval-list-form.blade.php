<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-3"><h2 class="card-title">บันทึกสายอนุมัติ</h2></div>
                <div class="col-3"></div>
                <div class="col-3" style="text-align: right;"></div>
                <div class="col-3" style="text-align: right;"></div>        
            </div>                      
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="leavapp_code" class="col-form-label">รหัส</label>
                        <input type="text" name="leavapp_code" id="leavapp_code" wire:model="leavapp_code"
                        class="form-control @error('leavapp_code') is-invalid @enderror">
                        @error('leavapp_code')
                        <div id="leavapp_code_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                        <label for="leavapp_name" class="col-form-label">ชื่อ</label>
                        <input type="text" name="leavapp_name" id="leavapp_name" wire:model="leavapp_name"
                        class="form-control @error('leavapp_name') is-invalid @enderror">
                        @error('leavapp_name')
                        <div id="leavapp_name_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="leavapp_status" class="col-form-label">สถานะ</label>
                        <select class="form-control @error('leavapp_status') is-invalid @enderror" wire:model="leavapp_status">
                            <option value="1">ใช้งาน</option>
                            <option value="0">ไม่ใช้งาน</option>
                        </select>
                        @error('leavapp_status')
                        <div id="leavapp_status_validation" class="invalid-feedback">
                        {{$message}}          
                        </div>
                        @enderror   
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap w-100 text-center">
                            <thead>
                                <tr style="background-color:#ddddddce">
                                    <th>#</th>
                                    <th>รหัสพนักงาน</th>
                                    <th>ชื่อ - นามสกุล</th>
                                    <th>สิทธิอนุมัติ</th>
                                    <th>
                                        @livewire('leave-approval.leave-approval-employee')
                                        <button type="button" 
                                        class="btn btn-success waves-effect waves-light"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#exampleModal"
                                        data-bs-whatever="@mdo">
                                        <i class="fas fa-plus"></i></button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emps as $key => $item)
                                <tr style="background-color:#F8F8FF">
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" readonly
                                            name="emp_id[]"
                                            wire:model="emps.{{$key}}.emp_id">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" readonly
                                            name="leavsub_empcode[]"
                                            wire:model="emps.{{$key}}.leavsub_empcode">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="form-control" type="text" readonly
                                            name="leavsub_empname[]"
                                            wire:model="emps.{{$key}}.leavsub_empname">
                                        </div>
                                    </td>
                                    <td>
                                        <select class="form-control" wire:model="emps.{{$key}}.leavsub_type">
                                            <option value="1">ผู้ตรวจสอบ</option>
                                            <option value="2">ผู้อนุมัติ</option>
                                        </select>
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
                    <div class="col-12" >
                        <div class="form-group">
                            <label for="leavapp_remark" class="col-form-label">หมายเหตุ</label>
                            <textarea class="form-control @error('leavapp_remark') is-invalid @enderror" wire:model="leavapp_remark"></textarea>
                            @error('leavapp_remark')
                            <div id="leavapp_remark_validation" class="invalid-feedback">
                            {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div> <hr>                
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>  
                </div>                     
            </form>           
        </div>      
    </div>
</div>
