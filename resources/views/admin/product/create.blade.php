{{--{{dd($slides)}}--}}
@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">{{$products ? 'Chi tiết sản phẩm' : 'Thêm mới sản phẩm'}}</h5>
                    <div class="card-body">
                        <form action="{{$products ? route('product.update',$products->id) : route('product.store')}}"
                              id="second_form" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-lg-4 control-label">Hình ảnh 1:</label>
                                            <div class="col-lg-8">
                                                <input type="file" id="image" name="product_image"
                                                       onchange="previewFile()"
                                                       style="display: none;">
                                                @if($products != null)
                                                    <img id="img" src="{{asset($products->product_image)}}"
                                                         alt="Ảnh sản phẩm"
                                                         width="200px" height="auto"
                                                         style="cursor: pointer;"/>
                                                @else
                                                    <img id="img" class="div_img" src="{{asset('img/none.png')}}"
                                                         alt="Ảnh huy hiệu" width="200px"
                                                         height="auto"
                                                         style="cursor: pointer;border: 1px dotted grey"/>
                                                @endif

                                                @if ( count($errors) > 0)
                                                    <span style="color:red;display: block;margin-top: 10px;">{{$errors->first('product_image')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-lg-4 control-label">Hình ảnh 2:</label>
                                            <div class="col-lg-8">
                                                <input type="file" id="image2" name="product_image2"
                                                       onchange="previewFile2()"
                                                       style="display: none;">
                                                @if($products != null)
                                                    <img id="img2" src="{{asset($products->product_image2)}}"
                                                         alt="Ảnh huy hiệu"
                                                         width="200px" height="auto"
                                                         style="cursor: pointer;"/>
                                                @else
                                                    <img id="img2" class="div_img" src="{{asset('img/none.png')}}"
                                                         alt="Ảnh huy hiệu" width="200px"
                                                         height="auto"
                                                         style="cursor: pointer;border: 1px dotted grey"/>
                                                @endif

                                                @if ( count($errors) > 0)
                                                    <span style="color:red;display: block;margin-top: 10px;">{{$errors->first('product_image2')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-lg-4 control-label">Hình ảnh 3:</label>
                                            <div class="col-lg-8">
                                                <input type="file" id="image3" name="product_image3"
                                                       onchange="previewFile3()"
                                                       style="display: none;">
                                                @if($products != null)
                                                    <img id="img3" src="{{asset($products->product_image3)}}"
                                                         alt="Ảnh huy hiệu"
                                                         width="200px" height="auto"
                                                         style="cursor: pointer;"/>
                                                @else
                                                    <img id="img3" class="div_img" src="{{asset('img/none.png')}}"
                                                         alt="Ảnh huy hiệu" width="200px"
                                                         height="auto"
                                                         style="cursor: pointer;border: 1px dotted grey"/>
                                                @endif

                                                @if ( count($errors) > 0)
                                                    <span style="color:red;display: block;margin-top: 10px;">{{$errors->first('product_image3')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group row">
                                            <label for="inputEmail2" class="col-lg-4 control-label">Hình ảnh 4:</label>
                                            <div class="col-lg-8">
                                                <input type="file" id="image4" name="product_image4"
                                                       onchange="previewFile4()"
                                                       style="display: none;">
                                                @if($products != null)
                                                    <img id="img4" src="{{asset($products->product_image4)}}"
                                                         alt="Ảnh huy hiệu"
                                                         width="200px" height="auto"
                                                         style="cursor: pointer;"/>
                                                @else
                                                    <img id="img4" class="div_img" src="{{asset('img/none.png')}}"
                                                         alt="Ảnh huy hiệu" width="200px"
                                                         height="auto"
                                                         style="cursor: pointer;border: 1px dotted grey"/>
                                                @endif
                                                @if ( count($errors) > 0)
                                                    <span style="color:red;display: block;margin-top: 10px;">{{$errors->first('product_image4')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Tên sản phẩm:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="product_name"
                                                       placeholder="Tên sản phẩm"
                                                       value="{{$products ? $products->product_name :  (old('product_name') ? old('product_name') : '')}}">
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_name')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Loại sản phẩm:</label>
                                            <div class="col-lg-8">
                                                <select type="text" class="form-control" name="product_category"
                                                        placeholder="Loại sản Phẩm">
                                                    @foreach($product_categorys as $product_category)
                                                        <option value="{{$product_category->id}}" {{($products && $products->product_category == $product_category->id) ? 'selected' : ''}}>{{$product_category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_category')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Giá:</label>
                                            <div class="col-lg-8">
                                                <input type="number" min="0" class="form-control" id="product_price"
                                                       name="product_price"
                                                       value="{{$products ? $products->product_price :  (old('product_price') ? old('product_price') : '')}}">
                                                {{--                        <input type="text" class="form-control" name="content" placeholder="Nội dung...">--}}
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_price')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Giá khuyến mại:</label>
                                            <div class="col-lg-8">
                                                <input type="number" min="0" class="form-control"
                                                       id="product_price_discount" name="product_price_discount"
                                                       value="{{$products ? $products->product_price_discount :  (old('product_price_discount') ? old('product_price_discount') : '')}}">
                                                {{--                        <input type="text" class="form-control" name="content" placeholder="Nội dung...">--}}
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_price_discount')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Màu sản phẩm:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="product_color"
                                                       placeholder="Màu sản phẩm"
                                                       value="{{$products ? $products->product_color :  (old('product_color') ? old('product_color') : '')}}">
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_color')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 control-label">Hãng sản phẩm:</label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" name="product_origin"
                                                       placeholder="Hãng sản phẩm"
                                                       value="{{$products ? $products->product_origin :  (old('product_origin') ? old('product_origin') : '')}}">
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_origin')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label">Tiêu đề: </label>
                                            <div class="col-sm-10">
                                            <textarea class="form-control" name="product_title"
                                                      name="content">{{$products ? $products->product_title :  (old('product_title') ? old('product_title') : '')}}</textarea>
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_title')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group row">
                                            <label class="col-lg-2 control-label">Mô tả:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control ckeditor" name="product_desc" style="min-height: 250px" id="editor">{{$products ? $products->product_desc :  (old('product_desc') ? old('product_desc') : '')}}</textarea>
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('product_desc')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button class="btn btn-space btn-primary" type="submit">
                                            {{$products ? 'Cập nhật' : 'Thêm mới'}}
                                        </button>
                                    </div>

                                    {{--Mô hình kinh doanh--}}
                                </div>
                            </div>
                        </form>
                    </div>
                    @if($products)
                    <div id="product_size">

                    </div>
                    @endif

                </div>
            </div>

        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Size:</label>
                                <div class="col-lg-9">
                                    <select type="text" class="form-control" id="size_id"
                                            placeholder="Loại sản Phẩm">
                                        @foreach($sizes as $item_size)
                                            <option value="{{$item_size->id}}" {{($products && $products->product_category == $product_category->id) ? 'selected' : ''}}>{{$item_size->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ( count($errors) > 0)
                                        <span style="color:red">{{$errors->first('size_id')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-lg-3 control-label">Số lượng:</label>
                                <div class="col-lg-9">
                                    <input type="number" min="0" class="form-control"
                                           id="quantity"
                                           value="0">
                                    @if ( count($errors) > 0)
                                        <span style="color:red">{{$errors->first('quantity')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary" id="save-Cart-Size" >Thêm</button>
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
        $("document").ready(function(){
            setTimeout(function(){
                $("div.alert").remove();
            }, 3000 ); // 5 secs

        });
        readyDetailProduct();
        function createCartSize(product_id,size_id,quantity) {
            $.ajax({
                type: 'POST',
                url: '{{route('product.create_size')}}',
                data:{
                    product_id:product_id,
                    size_id:size_id,
                    quantity:quantity,
                },
                success: function (data) {
                    var rs = data;
                    if (rs.status === 1) {
                        readyDetailProduct();
                        $('#exampleModal').modal('hide');
                        $('#exampleModal').modal('reset');
                    } else {

                    }
                }
            });
        }
        function readyDetailProduct() {
            var id = "{{ $products ? $products->id : null}}";
            $.ajax({
                type: 'GET',
                url: '{{route('product.readyDetailProduct')}}',
                data:{id:id},
                success: function (data) {
                    var rs = data;
                    if (rs.status === 1) {
                        $('#product_size').html(rs.view);
                    } else {
                    }
                }
            });
        }

        $('#save-Cart-Size').on('click',function () {
            var product_id = "{{$products ? $products->id : null}}";
            var size_id = $('#size_id').val();
            var quantity = $('#quantity').val();
            createCartSize(product_id,size_id,quantity);
        });

        $('#img').click(function () {
            $('#image').click();
        });

        function previewFile() {
            var preview = document.getElementById('img');
            var file = document.getElementById('image').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{$products ? asset($products->product_image) : ''}}";
            }
        }

        $('#img2').click(function () {
            $('#image2').click();
        });

        function previewFile2() {
            var preview = document.getElementById('img2');
            var file = document.getElementById('image2').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{$products ? asset($products->product_image2) : ''}}";
            }
        }

        $('#img3').click(function () {
            $('#image3').click();
        });
        function previewFile3() {
            var preview = document.getElementById('img3');
            var file = document.getElementById('image3').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{$products ? asset($products->product_image3) : ''}}";
            }
        }
        $('#img4').click(function () {
            $('#image4').click();
        });

        function previewFile4() {
            var preview = document.getElementById('img4');
            var file = document.getElementById('image4').files[0];
            var reader = new FileReader();
            reader.onloadend = function () {
                preview.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{$products ? asset($products->product_image4) : ''}}";
            }
        }
        $(document).ready(function () {
            $('#second_form').validate({
                errorClass: 'error-validate',
                rules: {
                    product_image: {
                        required: true,
                    },
                    product_image2: {
                        required: true,
                    },
                    product_image3: {
                        required: true,
                    },
                    product_image4: {
                        required: true,
                    },
                    product_name: {
                        required: true,
                    },
                    product_price: {
                        required: true,
                    },
                    product_color: {
                        required: true,
                    },
                    product_origin: {
                        required: true,
                    },
                    product_title: {
                        required: true,
                    },
                    product_desc: {
                        required: true,
                    },
                },
                messages: {
                    product_image: {
                        required: "Hình ảnh không được để trống.",
                    },
                    product_image2: {
                        required: "Hình ảnh không được để trống.",
                    },
                    product_image3: {
                        required: "Hình ảnh không được để trống.",
                    },
                    product_image4: {
                        required: "Hình ảnh không được để trống.",
                    },
                    product_name: {
                        required: "Tên sản phẩm không được để trống.",
                    },
                    product_price: {
                        required: "Giá sản phẩm không được để trống",
                    },
                    product_color: {
                        required: "Màu sản phẩm không được để trống",
                    },
                    product_origin: {
                        required: "Xuất xứ sản phẩm không được để trống.",
                    },
                    product_title: {
                        required: "Tiêu đề sản phẩm không được để trống",
                    },
                    product_desc: {
                        required: "Mô tả sản phẩm không được để trống",
                    },
                }
            });
        });
    </script>
@endsection