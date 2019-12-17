@extends('frontend.layout.master')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('styleFrontend/images/bg-02.jpg')}});">
        <h2 class="ltext-105 cl0 txt-center">
            Đăng kí & Đăng nhập
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 49%;margin-right: 20px">
                    <form action="{{route('front_end.registration')}}" method="post">
                        {{csrf_field()}}
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                           Đăng kí tài khoản
                        </h4>
                        @if(\Illuminate\Support\Facades\Session::has('succes'))
                            <div class="alert alert-success" role="alert">
                                {{\Illuminate\Support\Facades\Session::get('succes')}}
                            </div>
                        @endif
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;margin-left: 62px"  class="stext-111">{{$errors->first('name')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Họ và tên"  value="{{old('name')}}" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;margin-left: 62px" class="stext-111">{{$errors->first('email_registration')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email_registration" placeholder="Tài khoản"  value="{{old('email')}}" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;margin-left: 62px"  class="stext-111">{{$errors->first('password_registration')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_registration" placeholder="Mật khẩu" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;margin-left: 62px"  class="stext-111">{{$errors->first('password_confirm_registration')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_confirm_registration" placeholder="Nhập lại mật khẩu" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            Đăng kí
                        </button>
                    </form>
                </div>
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 49%">
                    <form action="{{route('front_end.postSign_in')}}" method="post" id="second_form" >
                        {{csrf_field()}}
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                           Đăng nhập
                        </h4>  @if(\Illuminate\Support\Facades\Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{\Illuminate\Support\Facades\Session::get('error')}}
                            </div>
                        @endif
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;" class="stext-111">{{$errors->first('email')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Tài khoản" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>
                      @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;" class="stext-111">{{$errors->first('password')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>


                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                           Đăng nhập
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#second_form').validate({
                errorClass: 'error-validate',
                rules: {
                    email: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: "Tên size không được để trống.",
                    },
                    password: {
                        required: "Tên size không được để trống.",
                    },
                }
            });
        });
    </script>
@endsection