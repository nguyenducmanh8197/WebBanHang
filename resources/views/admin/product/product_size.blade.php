@if($products)
    <div class="card-footer">
        <div class="row ">
            <div class="col-lg-12 text-right">
                <a href="" class="float-right btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal">Thêm
                    size</a>
            </div>
        </div>
        <div class="row">
            @foreach($products['detail'] as $item_detail)
                <div class="col-md-3" style="margin-top: 30px">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title border-bottom pb-2">{{$item_detail->name_size}}
                                <div class="dropdown no-arrow float-right">
                                    <a href="javascript:;" class="float-right btn btn-sm btn-danger" onclick="deleteSize({{$item_detail->id}})">Xóa</a>
                                </div>
                            </h3>
                            <p class="card-text">Số lượng : {{$item_detail['quantity']}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteSize(id) {
            $.ajax({
                type: 'POST',
                url: '{{route('product.delete_size')}}',
                data:{
                    id:id,
                },
                success: function (data) {
                    var rs = data;
                    if (rs.status == 1) {
                         alert('Bạn đã xóa thành công');
                        window.location.reload();
                    } else {
                    }
                }
            });
        }
    </script>
@endif
