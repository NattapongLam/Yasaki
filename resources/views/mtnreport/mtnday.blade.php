@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent border-bottom text-uppercase">
                    <h3 class="card-title">รายงานการซ่อมเครื่องจักร-รายวัน</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form method="GET" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-1">
                                        <label for="docuno" class="col-form-label">ระบุเลขที่เอกสาร</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" 
                                        name="docuno" 
                                        id="docuno" 
                                        class="form-control"
                                        value="{{$docuno}}">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="dep" class="col-form-label">เลือกแผนก</label>
                                    </div>
                                    <div class="col-sm-2">
                                            <select type="text" 
                                            name="dep" 
                                            id="dep" 
                                            class="form-control">
                                           <option value="">-- แผนก --</option>                                      
                                            @foreach ($deplist as $item)
                                            <option value="{{$item->department_name}}"
                                                @if($item->department_name == $dep) selected="selected" @endif>
                                                {{$item->department_name}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="department_name" class="col-form-label">วันที่เริ่ม</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" 
                                        name="datestart" 
                                        id="datestart" 
                                        class="form-control"
                                        value="{{$datestart}}">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="department_name" class="col-form-label">วันที่สิ้นสุด</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" 
                                        name="dateend" 
                                        id="dateend" 
                                        class="form-control"
                                        value="{{$dateend}}">
                                    </div>                                  
                                </div><br>
                                <div class="form-group row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4" style="text-align: right">
                                        <button class="btn btn-info w-lg">
                                            <i class="fas fa-search"></i> ค้นหา
                                        </button>
                                    </div>                                     
                                </div>                              
                            </form>
                        </div>
                    </div><br>
                    <div class="row">
                        <table id="tb_job" class="table table-bordered dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">สถานะ</th>
                                    <th style="text-align: center"></th>
                                    <th>วันที่</th>
                                    <th>เลขที่เอกสาร</th>
                                    <th>แผนก</th>
                                    <th>ประเภทงาน</th>
                                    <th>ระบบ</th>
                                    <th>บริการ</th>
                                    <th>เครื่องจักร</th>
                                    <th>อาการเสีย</th>
                                    <th>วันที่แก้ไข</th>
                                    <th>ผู้ดำเนิการ</th>
                                    <th>ผลการซ่อม</th>
                                    <th>ตรวจสอบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td style="text-align: center">{{$loop->index+1}}</td>
                                        <td style="text-align: center">
                                        @if ($item->sta_name == "รอดำเนินการ")
                                        <span class="badge bg-warning">รอดำเนินการ</span>
                                        @elseif($item->sta_name == "ยกเลิก")  
                                        <span class="badge bg-danger">ยกเลิก</span>
                                        @elseif($item->sta_name == "ดำเนินการแล้ว") 
                                        <span class="badge bg-success">ดำเนินการแล้ว</span>
                                        @elseif($item->sta_name == "ตรวจสอบแล้ว") 
                                        <span class="badge bg-info">ตรวจสอบแล้ว</span>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target=".bs-example-modal-center" 
                                            onclick="getDataMcListsub('{{ $item->id }}')">
                                            <i class="fas fa-eye"></i></a>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($item->machinery_hd_date)->format('d/m/Y')}}</td>
                                        <td>{{$item->machinery_hd_docuno}}</td>
                                        <td>{{$item->department_name}}</td>
                                        <td>{{$item->machinery_hd_type}}</td>
                                        <td>{{$item->ms_machine_system_name}}</td>
                                        <td>{{$item->ms_machine_service_name}}</td>
                                        <td>{{$item->ms_machine_name}} ({{$item->ms_machine_code}})</td>
                                        <td>{{$item->machinery_hd_note}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->machinery_hd_checkdate)->format('d/m/Y')}}</td>
                                        <td>{{$item->machinery_hd_personsave}}</td>
                                        <td>{{$item->machinery_hd_checknote}}</td>
                                        <td>{{$item->machinery_hd_checksave}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-center modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>วันที่</th>
                                    <th>จำนวนชั่วโมง</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody id="tb_list">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
<script>
      getDataMcListsub = (id) => {
        $.ajax({
            url: "{{ url('/getDataMcListsub') }}",
            type: "post",
            dataType: "JSON",
            data: {
                refid: id,
                _token: "{{ csrf_token() }}"
            },
            success: function(data) {
                console.log(data);
                let el_list = '';
                $.each(data.sub, function(key, item) {
                    el_list += `
                            <tr>
                                <td>${ item.machinery_dt_listno }</td>
                                <td>${ item.machinery_dt_date }</td>
                                <td>${ item.machinery_dt_hour }</td>
                                <td>${ item.machinery_dt_remark }</td>
                            </tr>
                            `
                })
                $('#tb_list').html(el_list);
            }
        });
    }
</script>