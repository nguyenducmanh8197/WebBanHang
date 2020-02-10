@extends('admin.layout.master')
@section('content')
       <div class="container-fluid  dashboard-content">
           <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   <div class="page-header">
                       <h2 class="pageheader-title">Danh sách tài khoản</h2>
                   </div>
               </div>
           </div>
           <form action="{{route('user.index')}}">
               <div class="row">
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
                           <select class="form-control form-control" name="type" onchange="this.form.submit()">
                               <option value="-1" {{$type == -1 ? 'selected' : ''}}>Loại tài khoản</option>
                               <option value="1" {{$type == 1 ? 'selected' : ''}}>Quản trị</option>
                               <option value="0" {{$type == 0 ? 'selected' : ''}}>Khách hàng</option>
                           </select>
                       </div>
                   </div>
               </div>
           </form>
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
                                        <tr id="imageStatus{{$user->id}}">
                                            <td style="text-align: center">{{$loop->iteration}}</td>
                                            <td><a href="{{route('user.edit',$user->id)}}" class="color">{{$user->name}}</a></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->type == 1 ? 'Quản trị' : 'Khách hàng'}}</td>
                                            <td style="text-align: center" class="image_Status">
                                                @if($user->active == 1)
                                                    <span  class="badge badge-pill badge-success">Đang hoạt động</span>
                                                @elseif($user->active == 0)
                                                    <span  class="badge badge-pill badge-warning">Không hoạt động</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center" >
                                                <a href="" style="margin-right: 10px;" class="btn-company-lock" data-value="{{$user->active}}" data-id="{{$user->id}}" >
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

        function onUpdate(id, active){
            var parent = $('#imageStatus' + id);
            $.ajax({
                type:'POST',
                url:'{{route('user.update_status')}}',
                data:{id:id, active:active},
                success:function(data){
                    var rs = data;
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
            var status = $(this).attr('data-value') == '1' ? 0 : 1;
            onUpdate(id, status);
        });
    </script>
@endsection
