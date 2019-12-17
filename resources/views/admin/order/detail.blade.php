@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
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
                                            <div class="card-header">Đơn hàng {{$order_number->order_number}}
                                                @if($order_number->status == 0)
                                                    <span  class="badge badge-pill badge-brand">Đặt hàng</span>
                                                @elseif($order_number->status == 1)
                                                    <span  class="badge badge-pill badge-warning">Đang xử lí</span>
                                                @elseif($order_number->status == 2)
                                                    <span  class="badge badge-pill badge-info">Đang giao hàng</span>
                                                @elseif($order_number->status == 3)
                                                    <span  class="badge badge-pill badge-success">Hoàn thành</span>
                                                @elseif($order_number->status == 4)
                                                    <span  class="badge badge-pill badge-dark">Đã thanh toán</span>
                                                @elseif($order_number->status == -1)
                                                    <span  class="badge badge-pill badge-danger">Hủy</span>
                                                @endif
                                                <button  class="float-right btn btn-primary" data-toggle="modal" data-target="#exampleModal"  {{$order_number->status == 3 ? 'disabled' : ''}}>Cập nhật</button>
                                                </div>
                                            <div class=card-body">
                                                <table class="table table-bordered table-hover">
                                                    <thead class="black white-text">
                                                    <tr>
                                                        <th style="width: 2%">#</th>
                                                        <th style="width: 20%">Sản phẩm</th>
                                                        <th style="width: 10%">Hình ảnh</th>
                                                        <th style="width: 15%" class="text-center">Số lượng</th>
                                                        <th class="text-center">Size</th>
                                                        <th class="text-center">Giá (VNĐ)</th>
                                                        <th class="text-center">Tổng tiền (VNĐ)</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($detail as $item)
                                                        <tr>
                                                            <td style="text-align: center">{{$loop->iteration}}</td>
                                                            <td>{{$item->product_name}}</td>
                                                            <td><img src="{{asset($item->product_image)}}" alt="" style="width:100% "></td>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cập nhật đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label">Trạng thái:</label>
                                    <div class="col-lg-9">
                                        <select type="text" class="form-control" id="status" name="selected"
                                                placeholder="Trạng thái">
                                            <option value="1">Đang xử lí</option>
                                            <option value="2">Đang giao hàng</option>
                                            <option value="4">Đã thanh toán</option>
                                            <option value="3">Hoàn thành</option>
                                            <option value="-1">Hủy</option>
                                        </select>
                                        @if ( count($errors) > 0)
                                            <span style="color:red">{{$errors->first('size_id')}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveStatu12s" >Lưu</button>
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
        $('#saveStatu12s').click(function (e) {
            e.preventDefault();
            var id = '{{$order_number->order_id}}';
            var status = $('#status').val();
            console.log(id,status)
            $.ajax({
                type: 'POST',
                url: '{{route('order_admin.update')}}',
                data:{
                    order_id:id,
                    status:status,
                },
                success: function (data) {
                    var rs = data;
                    if (rs.status === 1) {
                        window.location.reload();
                    } else {

                    }
                }
            });
        });

    </script>
@endsection
