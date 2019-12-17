{{--{{dd($slides)}}--}}
@extends('admin.layout.master')
@section('content')
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thêm mới size</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Basic Form</h5>
                    <div class="card-body">
                        <form action="{{route('productSize.store')}}" id="second_form" data-parsley-validate=""
                              novalidate="" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="col-sm-12 control-label">Tên size</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="name"
                                                           placeholder="Tên danh mục" value="{{old('name')}}">
                                                    @if ( count($errors) > 0)
                                                        <span style="color:red">{{$errors->first('name')}}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 text-right">
                                            <button class="btn btn-space btn-primary" type="submit">&nbsp;Thêm mới </button>
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