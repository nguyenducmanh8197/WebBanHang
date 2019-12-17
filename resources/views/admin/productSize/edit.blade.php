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
                                    <h2 class="title-1">Cập nhật slide</h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('productSize.update',$productSizes->id) }}" method="post" id="second_form" class="form-horizontal" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="box">
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="col-sm-12 control-label">Tên size:</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="name" placeholder="Tên" value="{{$productSizes->name}}">
                                                                @if ( count($errors) > 0)
                                                                    <span style="color:red">{{$errors->first('name')}}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 text-right">
                                                        <button class="btn btn-space btn-primary" type="submit">Cập nhật</button>
                                                    </div>
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
        $(document).ready(function () {
            $('#second_form').validate({
                errorClass: 'error-validate',
                rules: {
                    name: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Tên size không được để trống.",
                    },
                }
            });
        });
    </script>
@endsection