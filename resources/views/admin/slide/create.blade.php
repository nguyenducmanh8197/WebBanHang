{{--{{dd($slides)}}--}}
@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Thêm mới slide</h5>
                    <div class="card-body">
                        <form action="{{route('slide.store')}}" id="second_form" data-parsley-validate="" novalidate="" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="inputEmail2" class="col-lg-12 control-label">Hình ảnh</label>
                                            <div class="col-lg-12">
                                                <input type="file" id="image" name="image"
                                                       onchange="previewFile()"
                                                       style="display: none;">
                                                <img id="img" class="div_img" src="{{asset('img/none.png')}}"
                                                     alt="Ảnh huy hiệu" width="100%"
                                                     height="300px"
                                                     style="cursor: pointer;border: 1px dotted grey"/>
                                                @if ( count($errors) > 0)
                                                    <span style="color:red;display: block;margin-top: 10px;">{{$errors->first('image')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Tiêu đề:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{old('title')}}">
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('title')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Nội dung:</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control ckeditor" id="content" name="content" value="{{old('content')}}"></textarea>
                                                {{--                        <input type="text" class="form-control" name="content" placeholder="Nội dung...">--}}
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('content')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button class="btn btn-space btn-primary" type="submit">&nbsp;Thêm mới</i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
    </div>

@endsection
@section('js')
    <script>
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
                preview.src = "";
            }
        }
        $(document).ready(function () {
            $('#second_form').validate({
                errorClass: 'error-validate',
                rules: {
                    images: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    content: {
                        required: true,
                    },
                },
                messages: {
                    images: {
                        required: "Hình ảnh không được để trống.",
                    },
                    title: {
                        required: "Tiêu đề không được để trống.",
                    },
                    content: {
                        required: "Nội dung không được để trống",
                    },
                }
            });

        });
    </script>
@endsection