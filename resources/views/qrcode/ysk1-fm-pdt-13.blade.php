@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">แบบตรวจเช็คสถานีแก๊สประจำเดือน YSK1-FM-PDT-13</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ปี</th>
                            <th>เดือน</th>
                            <th>ผู้ตรวจเช็ค</th>
                            <th>ผู้รับทราบ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hd as $item)
                            <tr>
                                <td>{{$item->iso_pdt_fm13_hd_year}}</td>
                                <td>{{$item->iso_pdt_fm13_hd_month}}</td>
                                <td>{{$item->person_at}}</td>
                                <td>{{$item->approved_save}}</td>
                                <td class="text-center">
                                    <a href="{{route('ass-emp.show',$item->iso_pdt_fm13_hd_id)}}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                </a>                                                                             
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scriptjs')
<script>
     $(document).ready(function() {
            $('#tb_job_p').DataTable({             
                "autoWidth": false,
                "pageLength": 30,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "order": [ 1, "asc" ],
                dom: 'Bfrtip',
                buttons: [
                'copy','excel',
              ]       
            })
    });
</script>
@endpush