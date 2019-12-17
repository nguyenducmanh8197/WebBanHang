@extends('admin.layout.master')
@section('content')
       <div class="container-fluid  dashboard-content">
           <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   <div class="page-header">
                       <h2 class="pageheader-title">Danh sách người dùng</h2>
                   </div>
               </div>
           </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">Basic Table
                                <a href="{{route('user.create')}}" class="btn btn-primary btn-icon-split float-right">
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
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Loại tài khoản</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th style="text-align: center" width="11%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td style="text-align: center">{{$loop->iteration}}</td>
                                            <td><a href="{{route('user.edit',$user->id)}}" class="color">{{$user->name}}</a></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->type == 1 ? 'Admin' : 'Khách hàng'}}</td>
                                            <td style="text-align: center" class="account_active">
                                                @if($user->active == 1)
                                                    <span  class="badge badge-pill badge-success">Đang hoạt động</span>
                                                @elseif($user->active == 0)
                                                    <span  class="badge badge-pill badge-warning">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center" >
                                                <a href="" style="margin-right: 10px;" class="btn-account-lock" data-id="{{$user->id}}" data-active="{{$user->active}}" >
                                                    <i class="fa fa-fw {{$user->active == 1 ? 'fa-lock' : 'fa-unlock'}}"></i>
                                                </a>
                                                <a href="javascript:;"  id="confirm_delete" onclick="confirmRemove({{$user->id}})"><i class=" fas fa-trash"></i></a>
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
                url:'{{route('user.destroy')}}',
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

        function onUpdateAccount(id, active){
            var parent = $('#account_' + id);
            $.ajax({
                type:'POST',
                url:'{{route('user.update_active')}}',
                data:{id:id, active:active},
                success:function(data){
                    if(data.status === '1'){
                        parent.find('.btn-account-lock').attr('data-active', active);
                        if(active) {
                            parent.find('.account_active > span').removeClass('badge-warning').addClass('badge-success').html('Đang hoạt động');
                            parent.find('.btn-account-lock > i').removeClass('fa-unlock').addClass('fa-lock');
                        }else{
                            parent.find('.account_active > span').removeClass('badge-success').addClass('badge-warning').html('Không hoạt động');
                            parent.find('.btn-account-lock > i').removeClass('fa-lock').addClass('fa-unlock');
                        }
                    }else{
                        bootbox.alert("Bạn không có quyền.");
                    }
                }
            });
        }
        $(".btn-account-lock").click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var active = $(this).attr('data-active') == '1' ? 0 : 1;
            onUpdateAccount(id,active);
        });
    </script>
@endsection
