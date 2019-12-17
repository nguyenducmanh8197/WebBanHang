{{--{{dd($slides)}}--}}
@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Cập nhật Contact</h5>
                    <div class="card-body">
                        <form action="{{route('contact-admin.update',$contact->id)}}" id="second_form" data-parsley-validate="" novalidate="" method="post"  enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Địa chỉ:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{$contact->address}}">
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
                                            <label class="col-sm-12 control-label">Số điện thoại:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="phone_number" placeholder="Số điện thoại" value="{{$contact->phone_number}}">
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('phone_number')}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Email:</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="email" placeholder="email" value="{{$contact->email}}">
                                                @if ( count($errors) > 0)
                                                    <span style="color:red">{{$errors->first('email')}}</span>
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

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#second_form').validate({
                errorClass: 'error-validate',
                rules: {
                    address: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    content: {
                        required: true,
                    },
                },
                messages: {
                    address: {
                        required: "Địa chỉ không được để trống.",
                    },
                    email: {
                        required: "Email không được để trống.",
                    },
                    phone_number: {
                        required: "Số điện thoại không được để trống",
                    },
                }
            });

        });
    </script>
@endsection