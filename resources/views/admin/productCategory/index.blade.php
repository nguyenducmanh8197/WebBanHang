@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh mục sản phẩm</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Basic Table
                        <a href="{{route('productCategory.create')}}" class="btn btn-rounded btn-primary float-right">
                            Thêm &nbsp;<i class="fa fa-plus-circle"></i>
                        </a></div>
                    <div class=card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="black white-text">
                            <tr>
                                <th style="width: 2%">#</th>
                                <th style="width: 20%">Tên</th>
                                <th>Code</th>
                                <th class="text-center">Trạng thái</th>
                                <th style="text-align: center" width="20%">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productCategorys as $productCategory)
                                <tr id="imageStatus{{$productCategory->id}}">
                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                    <td>{{$productCategory->name}}</td>
                                    <td>{{$productCategory->code}}</td>
                                    <td style="text-align: center" class="image_Status">
                                        @if($productCategory->active == 1)
                                            <span  class="badge badge-pill badge-success">Đang hoạt động</span>
                                        @elseif($productCategory->active == 0)
                                            <span  class="badge badge-pill badge-warning">Không hoạt động</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center" >
                                        <a href="">
                                            <button type="button" data-value="{{$productCategory->active}}" data-id="{{$productCategory->id}}" class="btn btn-danger btn-sm btn-company-lock">
                                                <i class="fa fa-fw {{$productCategory->active == 1 ? 'fa-lock' : 'fa-unlock'}}"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('productCategory.edit',$productCategory->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:;" class="btn btn-danger btn-custom btn-sm" id="confirm_delete" onclick="confirmRemove({{$productCategory->id}})"><i class=" fas fa-trash"></i></a>
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
                url:'{{route('productCategory.destroy')}}',
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
                url:'{{route('productCategory.update_status')}}',
                data:{id:id, active:active},
                success:function(data){
                    var rs = data;
                    console.log(rs.status == 1,'rs.status == 1');
                    if(rs.status == 1){
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
            var status = $(this).attr('data-value') == 1 ? 0 : 1;
            onUpdate(id, status);
        });
    </script>
@endsection
