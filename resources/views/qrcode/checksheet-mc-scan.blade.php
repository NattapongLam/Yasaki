@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-transparent border-bottom text-uppercase">
                <h3 class="card-title">ตรวจเช็คเครื่องจักรประจำวัน</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>
                            <tr>
                                <th>เดือน-ปี</th>
                                <th>รหัสเครื่องจักร</th>
                                <th>ชื่อเครื่องจักร</th>
                                <th></th>
                            </tr>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($hd as $item)
                            <tr>
                                <td>{{\Carbon\Carbon::parse($item->checksheetmc_hd_date)->format('m/Y')}}</td>
                                <td>{{$item->ms_machine_code}}</td>
                                <td>{{$item->ms_machine_name}}</td>
                                <td class="text-center">
                                    <a href="{{route('mc_check.edit',$item->id)}}"
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

</script>
@endpush