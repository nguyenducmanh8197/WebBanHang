@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thống kê sản phẩm mới</h2>
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
                                <th style="width: 200px">Tên sản phảm</th>
                                <th style="width: 10%;text-align: center">Hình ảnh</th>
                                <th style="width: 150px" class="text-center">Loại sản phẩm</th>
                                <th class="text-left">Tiêu đề</th>
                                <th class="text-right" style="width: 100px">Giá (₫)</th>
                                <th class="text-center">Trạng thái</th>
                                <th class="text-center" width="100px">Số lượng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products_new as $product)
                                <tr id="imageStatus{{$product->id}}">
                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                    <td><a href="{{route('product.edit',$product->id)}}">{{$product->product_name}}</a>
                                    </td>
                                    <td><img src="{{asset($product->product_image)}}" alt="" style="width:100% "></td>
                                    <td class="text-center">{{$product->name}}</td>
                                    <td>{{$product->product_title}}</td>
                                    <td class="text-right">{{number_format($product->product_price)}}</td>
                                    <td style="text-align: center" class="image_Status">
                                        @if($product->product_active == 1)
                                            <span class="badge badge-pill badge-success">Đang hoạt động</span>
                                        @elseif($product->product_active == 0)
                                            <span class="badge badge-pill badge-warning">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{number_format($product->total_quantity)}}</td>
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
