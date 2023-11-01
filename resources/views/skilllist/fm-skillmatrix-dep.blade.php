@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Skill Matrix</h4>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>แผนก</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hd as $item)
                            <tr>
                                <td>{{$item->department_name}}</td>
                                <td class="text-center">
                                    <a href="{{route('skill.show',$item->department_id)}}" class="btn btn-soft-info waves-effect waves-light"><i class="fas fa-eye"></i></a>
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
@endsection
@push('scriptjs')
@endpush