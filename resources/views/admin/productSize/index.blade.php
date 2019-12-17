@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách size sản phẩm</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Basic Table
                        <a href="{{route('productSize.create')}}" class="btn btn-primary btn-icon-split float-right">
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
                                <th style="width: 20%">Tên</th>
                                <th class="text-left">Trạng thái</th>
                                <th style="text-align: center" width="11%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productSizes as $productSize)
                                <tr id="imageStatus{{$productSize->id}}">
                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                    <td>{{$productSize->name}}</td>
                                    <td style="text-align: center" class="image_Status">
                                        @if($productSize->active == 1)
                                            <span  class="badge badge-pill badge-success">Đang hoạt động</span>
                                        @elseif($productSize->active == 0)
                                            <span  class="badge badge-pill badge-warning">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center" >
                                        <a href="">
                                            <button type="button" data-value="{{$productSize->active}}" data-id="{{$productSize->id}}" class="btn btn-danger btn-sm btn-company-lock">
                                                <i class="fa fa-fw {{$productSize->active == 1 ? 'fa-lock' : 'fa-unlock'}}"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('productSize.edit',$productSize->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-custom btn-sm" id="confirm_delete" onclick="confirmRemove({{$productSize->id}})"><i class=" fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float: right; margin-top: 20px">
                            {{$productSizes->links()}}
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
        function onDelete(id){
            $.ajax({
                type:'post',
                url:'{{route('productSize.destroy')}}',
                data:{id:id},
                success:function(data){
                    var rs = data;
                    if(rs.status === 1){
                        alert('Bạn đã xóa thành công');
                        window.location.reload();
                    }else{
                        alert('Lỗi');
                    }
                }
            });
        }
        function confirmRemove(id){
            bootbox.confirm({
                message: "Bạn chắc chắn muốn xóa chứ ?",
                buttons:{
                    confirm:{
                        label : 'Có',
                        className: 'btn-success'
                    },
                    cancel:{
                        label : 'Không',
                        className : 'btn-danger'
                    }
                },
                callback:function (result) {
                    if (result){
                        onDelete(id);
                    }
                }
            });
        }
        function onUpdate(id, active){
            var parent = $('#imageStatus' + id);
            $.ajax({
                type:'POST',
                url:'{{route('productSize.update_status')}}',
                data:{id:id, active:active},
                success:function(data){
                    var rs = data;
                    if(rs.status == 1){
                        console.log(rs.status,'rs.status')
                        parent.find('.btn-company-lock').attr('data-value', active);
                        if(active) {
                            parent.find('.image_Status > span').removeClass('badge-warning').addClass('badge-success').html('Đang hoạt động');
                            parent.find('.btn-company-lock > i').removeClass('fa-unlock').addClass('fa-lock');
                        }else{
                            parent.find('.image_Status > span').removeClass('badge-success').addClass('badge-warning').html('Không hoạt động');
                            parent.find('.btn-company-lock > i').removeClass('fa-lock').addClass('fa-unlock');
                        }
                    }else{
                        alert('Lỗi');
                    }
                }
            });
        }
        $(".btn-company-lock").click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var status = $(this).attr('data-value') == '1' ? 0 : 1;
            onUpdate(id, status);
        });
    </script>
@endsection
