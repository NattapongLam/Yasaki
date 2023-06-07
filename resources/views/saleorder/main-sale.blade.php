@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">               
                <div class="card-body">
                 <div class="row">
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: darkseagreen">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/1200px-Circle-icons-rocket.svg.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="javascript: void(0);" class="text-white">ออกใบสั่งจอง</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: cornflowerblue">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/Circle-icons-check.svg.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="{{route('stock-sale.index')}}" class="text-white">สต็อคสินค้า</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: burlywood">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/good-icon.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="{{route('sale-tip.create')}}" class="text-white">แผนพบลูกค้า</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: lightcoral">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/Circle-icons-cloud.svg.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="javascript: void(0);" class="text-white">รายงานพบลูกค้า</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: deepskyblue">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/1200px-Circle-icons-shop.svg.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="javascript: void(0);" class="text-white">แจ้งปัญหา</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: darkslateblue">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/3180075.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="javascript: void(0);" class="text-white">งานเคลม</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: darkorange">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/3135715.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="javascript: void(0);" class="text-white">ประเมินความพึ่งพอใจ</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-3">
                        <div class="card">
                            <div class="card-body" style="background-color: fuchsia">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-4">
                                        <div class="avatar-md">
                                            <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                                <img src="assets/images/icon/Circle-icons-star.svg.png" alt="" height="70">
                                            </span>
                                        </div>
                                    </div>                                        
                                    <div class="flex-grow-1 overflow-hidden">                                               
                                        <h5 class="text-truncate font-size-16"><a href="{{route('isosal.list')}}" class="text-white">เอกสาร ISO</a></h5>                                                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection