@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thống kê sản phẩm bán chạy</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class=card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="black white-text">
                            <tr>
                                <th style="width: 2%">#</th>
                                <th style="">Tên sản phẩm</th>
                                <th style="width: 10%">Hình ảnh</th>
                                <th class="text-right" width="200px">Giá (₫)</th>
                                <th class="text-center" width="10%">Lượt mua</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products_sale as $item)
                                <tr>
                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td><img src="{{asset($item->product_image)}}" alt="" style="width:100% "></td>
                                    <td class="text-right">{{number_format($item->product_price)}}</td>
                                    <td class="text-center">{{number_format($item->product_quantity)}}</td>
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
