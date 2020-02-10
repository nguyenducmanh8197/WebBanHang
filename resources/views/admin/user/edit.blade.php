@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="title-1">Cập nhật tài khoản</h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.update',$user->id) }}" method="POST"
                                          id="save-user-form" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group has-success">
                                            <label for="inputEmail2" class="col-lg-12 control-label">Hình ảnh</label>
                                            <div class="col-lg-12">
                                                <input type="file" id="image" name="image"
                                                       onchange="previewFile()"
                                                       style="display: none;">
                                                <img id="img" class="div_img" src="{{asset($user->image)}}"
                                                     alt="Ảnh huy hiệu" width="30%"
                                                     height="300px"
                                                     style="cursor: pointer;border: 1px dotted grey"/>
                                                @if ( count($errors) > 0)
                                                    <span style="color:red;display: block;margin-top: 10px;">{{$errors->first('image')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label for="" class="control-label mb-1">Tên:</label>
                                            <input type="text" class="form-control cc-name valid" name="name"
                                                   value="{{$user->name}}"
                                                   placeholder="Must be 8-20 characters long.....">
                                        </div>
                                        @if ( count($errors) > 0)
                                            <span style="color:red">{{$errors->first('name')}}</span>
                                        @endif
                                        <div class="form-group has-success">
                                            <label for="" class="control-label mb-1">Email:</label>
                                            <input type="text" class="form-control cc-name valid" name="email"
                                                   placeholder="Please enter valid email" value="{{$user->email}}">
                                        </div>
                                        @if ( count($errors) > 0)
                                            <span style="color:red">{{$errors->first('email')}}</span>
                                        @endif
                                        <div class="form-group has-success">
                                            <label for="" class="control-label mb-1">Số điện thoại:</label>
                                            <input type="text" class="form-control cc-name valid" name="phone_number"
                                                   placeholder="Vui lòng nhập số điện thoại" value="{{$user->phone_number}}"
                                                   id="phone_number">
                                        </div>
                                        @if ( count($errors) > 0)
                                            <span style="color:red">{{$errors->first('phone_number')}}</span>
                                        @endif
                                        <div class="form-group has-success">
                                            <label for="" class="control-label mb-1">Địa chỉ:</label>
                                            <input type="text" class="form-control cc-name valid" name="address"
                                                   placeholder="Vui lòng nhập địa chỉ" value="{{$user->address}}"
                                                   id="address">
                                        </div>
                                        @if ( count($errors) > 0)
                                            <span style="color:red">{{$errors->first('address')}}</span>
                                        @endif
                                        <div class="form-check-inline">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type"
                                                       id="gridRadios1" value="1" {{$user->type ==1 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Quản trị
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="type"
                                                       id="gridRadios2" value="0" {{$user->type ==0 ? 'checked' : ''}}>
                                                <label class="form-check-label" for="gridRadios2">
                                                    Khách hàng
                                                </label>
                                            </div>
                                        </div>
                                        <br/>
                                        <button class="btn btn-space btn-primary float-right"><i
                                                    class="fa fa-user-plus">&nbsp;Cập nhật</i></button>
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
                preview.src = "{{$user ? asset($user->image) : ''}}";
            }
        }
        $(document).ready(function () {
            $('#save-user-form').validate({
                errorClass: 'error-validate',
                rules: {
                    name: {
                        required: true,
                        minlength: 8,
                        maxlength: 20
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    name: {
                        required: "Tên không được để trống.",
                        minlength: "Nhập tối thiểu 8 ký tự.",
                        maxlength: "Nhập tối đa 20 ký tự."
                    },
                    email: {
                        required: "Email không được để trống.",
                        email: "Không đúng định dạng email."
                    },
                }
            });
        });
    </script>
@endsection