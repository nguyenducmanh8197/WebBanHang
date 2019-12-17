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
                                    <h2 class="title-1">Cập nhật About</h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('about.update',$abouts->id) }}" method="post" id="second_form" class="form-horizontal" enctype="multipart/form-data">
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
                                                            <img id="img" class="div_img" src="{{asset($abouts->image)}}"
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
                                                            <input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{$abouts->title}}">
                                                            @if ( count($errors) > 0)
                                                                <span style="color:red">{{$errors->first('title')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label class="col-sm-12 control-label">Nội dung:</label>
                                                        <div class="col-sm-12 ">
                                                            <textarea  type="text"  class="form-control ckeditor"  name="content"
                                                                       placeholder="Nội dung..." >{{$abouts->content}}</textarea>
                                                            @if ( count($errors) > 0)
                                                                <span style="color:red">{{$errors->first('content')}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 text-right">
                                                    <button class="btn btn-space btn-primary" type="submit">Cập nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                preview.src = "{{$abouts ? asset($abouts->image) : ''}}";
            }
        }
        $(document).ready(function () {
            $('#save-user-form').validate({
                errorClass: 'error-validate',
                rules: {
                    name: {
                        required: true,
                    },
                    code: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Tên không được để trống.",
                    },
                    code: {
                        required: "Code không được để trống",
                    },
                }
            });
        });
    </script>
@endsection