@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách sản phẩm</h2>
                </div>
            </div>
        </div>
        <form action="{{route('product.index')}}">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="keyword"
                               value="{{$keyword ? $keyword : ''}}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                    <div class="form-group">
                        <select class="form-control form-control" name="active" onchange="this.form.submit()">
                            <option value="-1" {{$active == -1 ? 'selected' : ''}}>Trạng thái</option>
                            <option value="1" {{$active == 1 ? 'selected' : ''}}>Đang hoạt động</option>
                            <option value="0" {{$active == 0 ? 'selected' : ''}}>Không hoạt động</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
                    <div class="form-group">
                        <select class="form-control form-control" name="product_category" onchange="this.form.submit()">
                            <option value="-1" {{$product_category == -1 ? 'selected' : ''}}>Loại sản phẩm</option>
                            @foreach($productCategorys as $item)
                                <option value="{{$item->id}}" {{$product_category == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Basic Table
                        <a href="{{route('product.create')}}" class="btn btn-primary btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fa fa-plus-circle"></i>
                            </span>
                            <span class="text">Thêm mới</span>
                        </a>
                    </div>
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
                                <th style="text-align: center" width="100px">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
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
                                    <td style="text-align: center">
                                        <a href="">
                                            <button type="button" data-value="{{$product->product_active}}"
                                                    data-id="{{$product->id}}"
                                                    class="btn btn-danger btn-sm btn-company-lock">
                                                <i class="fa fa-fw {{$product->product_active == 1 ? 'fa-lock' : 'fa-unlock'}}"></i>
                                            </button>
                                        </a>
                                        <a href="javascript:;" class="btn btn-danger btn-custom btn-sm"
                                           id="confirm_delete" onclick="confirmRemove({{$product->id}})"><i
                                                    class=" fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float: right; margin-top: 20px">
                            {{$products->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function onDelete(id) {
            $.ajax({
                type: 'post',
                url: '{{route('product.destroy')}}',
                data: {id: id},
                success: function (data) {
                    var rs = data;
                    if (rs.status === 1) {
                        alert('Bạn đã xóa thành công');
                        window.location.reload();
                    } else {
                        alert('Lỗi');
                    }
                }
            });
        }

        function confirmRemove(id) {
            bootbox.confirm({
                message: "Bạn chắc chắn muốn xóa chứ ?",
                buttons: {
                    confirm: {
                        label: 'Có',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Không',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if (result) {
                        onDelete(id);
                    }
                }
            });
        }

        function onUpdate(id, active) {
            var parent = $('#imageStatus' + id);
            $.ajax({
                type: 'POST',
                url: '{{route('product.update_status')}}',
                data: {id: id, product_active: active},
                success: function (data) {
                    var rs = data;
                    if (rs.status == 1) {
                        parent.find('.btn-company-lock').attr('data-value', active);
                        if (active) {
                            parent.find('.image_Status > span').removeClass('badge-warning').addClass('badge-success').html('Đang hoạt động');
                            parent.find('.btn-company-lock > i').removeClass('fa-unlock').addClass('fa-lock');
                        } else {
                            parent.find('.image_Status > span').removeClass('badge-success').addClass('badge-warning').html('Không hoạt động');
                            parent.find('.btn-company-lock > i').removeClass('fa-lock').addClass('fa-unlock');
                        }
                    } else {
                        alert('Lỗi');
                    }
                }
            });
        }

        $(".btn-company-lock").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            var status = $(this).attr('data-value') == '1' ? 0 : 1;
            onUpdate(id, status);
        });
    </script>
@endsection
