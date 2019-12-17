@extends('frontend.layout.master')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
             style="background-image: url({{asset('styleFrontend/images/bg-02.jpg')}});">
        <h2 class="ltext-105 cl0 txt-center">
            CHI TIẾT ĐƠN HÀNG
        </h2>
    </section>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container" style="margin-top: 60px;margin-bottom: 60px">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="title-1">Chi tiết đơn hàng</h2>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header">Đơn hàng {{$order_number->order_number}}</div>
                                            <div class=card-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead class="black white-text">
                                                    <tr>
                                                        <th style="width: 2%">#</th>
                                                        <th style="width: 25%">Sản phẩm</th>
                                                        <th style="width: 10%" class="text-center">Hình ảnh</th>
                                                        <th style="width: 15%" class="text-center">Số lượng</th>
                                                        <th class="text-center">Size</th>
                                                        <th class="text-center">Giá (₫)</th>
                                                        <th class="text-center">Tổng tiền (₫)</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th style="width: 2%">#</th>
                                                        <th style="width: 20%">Sản phẩm</th>
                                                        <th style="width: 10%" class="text-center">Hình ảnh</th>
                                                        <th style="width: 15%" class="text-center">Số lượng</th>
                                                        <th class="text-center">Size</th>
                                                        <th class="text-center">Giá (₫)</th>
                                                        <th class="text-center">{{number_format($total_amount)}}</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($detail as $item)
                                                        <tr>
                                                            <td style="text-align: center">{{$loop->iteration}}</td>
                                                            <td>{{$item->product_name}}</td>
                                                            <td><img src="{{asset($item->product_image)}}" alt=""
                                                                     style="width:100% "></td>
                                                            <td class="text-center">{{$item->quantity}}</td>
                                                            <td class="text-center">{{$item->size_name}}</td>
                                                            <td class="text-center">{{number_format($item->price)}}</td>
                                                            <td class="text-center">{{number_format($item->price*$item->quantity)}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
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
