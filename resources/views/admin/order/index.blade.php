@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách đơn hàng</h2>
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
                                <th style="width: 20%">Mã đơn hàng</th>
                                <th>Thông tin người nhận</th>
                                <th style="width: 13%">Thanh toán</th>
                                <th class="text-center" width="200px">Ngày mua</th>
                                <th class="text-center" width="5%">Trạng thái</th>
                                <th class="text-center" width="100px">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $item)
                                <tr id="orderStatus{{$item->id}}" >
                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                    <td><a href="{{route('order_admin.detail',$item->id)}}">{{$item->order_number}}</a></td>
                                    <td><div>
                                            <span>Tên khách hàng : {{$item->phone_number}}</span><br/>
                                            <span>Số điện thoại : {{$item->phone_number}}</span><br/>
                                            <span>Địa chỉ : {{$item->order_desc}}</span>
                                        </div></td>
                                    <td>@if($item->payments === 0)
                                            <span>Thanh toán tiền mặt</span>
                                            @elseif($item->payments === 1)
                                            <span>Thanh toán online</span>
                                            @endif
                                    </td>
                                    <td class="text-center">{{date_format($item->updated_time, 'h:m d-m-Y')}}</td>
                                    <td class="text-center">  @if($item->status == 0)
                                            <span  class="badge badge-pill badge-brand">Đặt hàng</span>
                                        @elseif($item->status == 1)
                                            <span  class="badge badge-pill badge-warning">Đang xử lí</span>
                                        @elseif($item->status == 2)
                                            <span  class="badge badge-pill badge-info">Đang giao hàng</span>
                                        @elseif($item->status == 3)
                                            <span  class="badge badge-pill badge-success">Hoàn thành</span>
                                        @elseif($item->status == 4)
                                            <span  class="badge badge-pill badge-dark">Đã thanh toán</span>
                                        @elseif($item->status == -1)
                                            <span  class="badge badge-pill badge-danger">Hủy</span>
                                        @endif</td>
                                    <td class="text-center">
                                        <button {{$item->status == 3 ? 'disabled' : ''}} class="float-right btn btn-sm btn-primary saveStatus1" data-toggle="modal" data-target="#exampleModal" data-id="{{$item->id}}">Cập nhật</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
                                        <input type="text" name="id" value=""  id="order_id" hidden/>
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
    <script type="text/javascript">
        $(function () {
            $(".saveStatus1").click(function () {
                var _order_id = $(this).data('id');
                $('.modal-body input[name="id"]').val(_order_id);
            })
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#saveStatu12s').click(function (e) {
            e.preventDefault();
            var id = $('.modal-body input[name="id"]').val();
            var status = $('#status').val();
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
