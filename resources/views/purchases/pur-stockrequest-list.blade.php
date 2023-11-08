@extends('layouts.main')
@section('content')
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
                <h4 class="card-title mb-4">รายการใบเสนอซื้อรออนุมัติ</h4>
                <div class="table-responsive">
                    <table id="tb_job" class="table mb-0 border-collapse">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th>เลขที่เอกสาร</th>
                                <th>แผนก</th>
                                <th>หมายเหตุ</th>
                                <th class="text-center">สถานะ</th>
                                <th>ผู้อนุมัติ</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hd as $item)
                               <tr>
                                <td>{{\Carbon\Carbon::parse($item->docudate)->format('d/m/Y')}}</td>
                                <td>{{$item->docuno}}</td>
                                <td>{{$item->departmentcode}}</td>
                                <td>{{$item->remark1}} {{$item->remark2}}</td>  
                                <td class="text-center">
                                    @if($item->pur_stockrequest_status_id == 1)
                                    <span class="badge bg-success">{{$item->pur_stockrequest_status_name}}</span>
                                    @elseif($item->pur_stockrequest_status_id == 2)
                                    <span class="badge bg-danger">{{$item->pur_stockrequest_status_name}}</span>
                                    @elseif($item->pur_stockrequest_status_id == 3)
                                    <span class="badge bg-warning">{{$item->pur_stockrequest_status_name}}</span>
                                    @elseif($item->pur_stockrequest_status_id == 4)
                                    <span class="badge bg-secondary">{{$item->pur_stockrequest_status_name}}</span>
                                    @endif                                                                      
                                </td>         
                                <td>{{$item->approvelsave}}</td>                    
                                <td class="text-center">
                                    @if ($item->pur_stockrequest_status_id == 3)
                                    <a href="{{route('stockrequest.edit',$item->docuno)}}" 
                                        class="btn btn-soft-info waves-effect waves-light" 
                                        target=”_blank”><i class="fas fa-edit"></i>
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target=".bs-example-modal-center" 
                                            onclick="getDataPr('{{ $item->docuno }}')">
                                            <i class="fas fa-eye"></i></a>
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
                                <th>วันที่ต้องการ</th>
                                <th>สินค้า</th>
                                <th>จำนวน</th>
                                <th>Stock</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>ค้างรับ</th>
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
@push('scriptjs')
<script>
    getDataPr = (id) => {
      $.ajax({
          url: "{{ url('/getDataPr') }}",
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
                              <td>${ item.listno }</td>
                              <td>${ item.wantdate }</td>
                              <td>${ item.itemcode }/${ item.itemname }</td>
                              <td>${ parseFloat(item.qty).toFixed(2) }/${ item.unitname }</td>
                              <td>${ parseFloat(item.stockqty).toFixed(2) }</td>
                              <td>${ parseFloat(item.stockmin).toFixed(2) }</td>
                              <td>${ parseFloat(item.stockmax).toFixed(2) }</td>
                              <td>${ parseFloat(item.remaininqty).toFixed(2) }</td>
                          </tr>
                          `
              })
              $('#tb_list').html(el_list);
          }
      });
  }
</script>
@endpush