@extends('admin.layout.master')
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Danh sách phản hồi</h2>
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
                                <th style="width: 10px">STT</th>
                                <th style="width: 300px">Email</th>
                                <th>Nội dung</th>
                                <th class="text-center" style="width: 200px">Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $item)
                                <tr>
                                    <td style="text-align: center">{{$loop->iteration}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->desc}}</td>
                                    <td>{{date_format($item->created_at,'h:i:s d-m-Y')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="float: right; margin-top: 20px">
                            {{$feedbacks->links()}}
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
                url:'{{route('feedback.destroy')}}',
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
                url:'{{route('about.update_status')}}',
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
