@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thêm mới người dùng</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="post" id="second_form">
                            {{csrf_field()}}
                            <div class="form-group has-success">
                                <label for="" class="control-label mb-1">Tên:</label>
                                <input type="text" class="form-control cc-name valid" name="name"
                                       value="{{old('name')}}"
                                       placeholder="Must be 8-20 characters long....." id="name">
                                <span cl></span>
                            </div>
                            @if ( count($errors) > 0)
                                <span style="color:red">{{$errors->first('name')}}</span>
                            @endif
                            <div class="form-group has-success">
                                <label for="" class="control-label mb-1">Email:</label>
                                <input type="text" class="form-control cc-name valid" name="email"
                                       placeholder="Please enter valid email" value="{{old('email')}}"
                                       id="email">
                            </div>
                            @if ( count($errors) > 0)
                                <span style="color:red">{{$errors->first('email')}}</span>
                            @endif
                            <div class="form-group has-success">
                                <label for="" class="control-label mb-1">Password:</label>
                                <input type="password" class="form-control cc-name valid" name="password"
                                       id="password" value="{{old('password')}}">
                            </div>
                            @if ( count($errors) > 0)
                                <span style="color:red">{{$errors->first('password')}}</span>
                            @endif
                            <div class="form-group has-success">
                                <label for="" class="control-label mb-1">Password Confirm:</label>
                                <input type="password" class="form-control cc-name valid" name="password_confirm"
                                       id="password_confirm" value="{{old('password_confirm')}}">
                            </div>
                            @if ( count($errors) > 0)
                                <span style="color:red">{{$errors->first('password_confirm')}}</span>
                            @endif
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="1" name="type">Quản trị
                                </label>
                            </div>
                            <br/>
                            <button class="btn btn-space btn-primary float-right"><i
                                        class="fa fa-user-plus">&nbsp;Thêm</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#second_form').validate({
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
                    password: {
                        required: true,
                        minlength: 6
                    },
                    password_confirm: {
                        required: true,
                        equalTo: "#password"
                    }
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
                    password: {
                        required: "Vui lòng nhập password.",
                        minlength: "Nhập password tối thiểu 6 ký tự."
                    },
                    password_confirm: {
                        required: "Vui lòng xác nhận password.",
                        equalTo: "Password không khớp"
                    }
                }
            });

        });
    </script>
@endsection