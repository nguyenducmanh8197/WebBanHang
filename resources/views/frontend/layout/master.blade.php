<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>

        <!DOCTYPE html>
<html lang="en">
<head>
    @if($page === 1)
        <title>Trang chủ</title>
        @elseif($page === 2)
        <title>Sản phẩm</title>
        @elseif($page === 3)
        <title>Bài viết</title>
        @elseif($page === 4)
        <title>Liên hệ</title>
        @elseif($page === 5)
        <title>Chi tiết sản phẩm</title>
        @elseif($page === 6)
        <title>Đăng nhập & đăng kí</title>
        @elseif($page === 7)
        <title>Tài khoản của bạn</title>
        @elseif($page === 8)
        <title>Chi tiết đơn hàng</title>
        @endif
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    @include('frontend.inc.style')
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="animsition">
<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Giao hàng miễn phí cho đơn hàng tiêu chuẩn trên {{number_format(1000000)}} VNĐ

                </div>
                <div class="right-top-bar flex-w h-full">
                    @if(!$user)
                        <a href="{{route('front_end.sign_up')}}" class="flex-c-m trans-04 p-lr-25"> Đăng ký & Đăng
                            nhập</a>
                    @endif
                    @if($user)
                        <a href="{{route('front_end.my-account',$user->id)}}"
                           class="flex-c-m trans-04 p-lr-25"> {{$user->name}}</a>
                        @endif
                    @if($user)
                        <a href="{{route('logout')}}" class="flex-c-m trans-04 p-lr-25" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="sign-out-alt"></i>Logout</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="wrap-menu-desktop how-shadow1" style="z-index: 88">
            <nav class="limiter-menu-desktop container">
                <!-- Logo desktop -->
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('styleFrontend/images/icons/logo-01.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{$page === 1 ? 'active-menu' : ''}}">
                            <a href="{{route('home')}}">Trang chủ</a>
                        </li>
                        <li class="{{$page === 2 ? 'active-menu' : ''}}">
                            <a href="{{route('frontend_product.index')}}">Sản phẩm</a>
                        </li>
                        <li class="{{$page === 3 ? 'active-menu' : ''}}">
                            <a href="{{route('frontend_about.index')}}">Bài viết</a>
                        </li>

                        <li class="{{$page === 4 ? 'active-menu' : ''}}">
                            <a href="{{route('frontend_contact.index')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         id="quantity_cart" data-notify="">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->

    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Giao hàng miễn phí cho đơn hàng tiêu chuẩn trên {{number_format(1000000)}} VNĐ
                </div>
            </li>
            <li>
                <div class="right-top-bar flex-w h-full">
                    @if(!$user)
                        <a href="{{route('front_end.sign_up')}}" class="flex-c-m p-lr-10 trans-04"> Đăng ký & Đăng
                            nhập</a>
                    @endif
                    @if($user)
                        <a href="{{route('front_end.my-account',$user->id)}}"
                           class="flex-c-m p-lr-10 trans-04"> {{$user->name}}</a>
                    @endif
                    @if($user)
                        <a href="{{route('logout')}}" class="flex-c-m p-lr-10 trans-04" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="sign-out-alt"></i>Logout</a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            {{csrf_field()}}
                        </form>
                    @endif
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li class="{{$page === 1 ? 'active-menu' : ''}}">
                <a href="{{route('home')}}">Trang chủ</a>
            </li>
            <li class="{{$page === 2 ? 'active-menu' : ''}}">
                <a href="{{route('frontend_product.index')}}">Sản phẩm</a>
            </li>
            <li class="{{$page === 3 ? 'active-menu' : ''}}">
                <a href="{{route('frontend_about.index')}}">Bài viết</a>
            </li>

            <li class="{{$page === 4 ? 'active-menu' : ''}}">
                <a href="{{route('frontend_contact.index')}}">Liên hệ</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
</header>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>
    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>
            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        <div class="header-cart-content flex-w js-pscroll show-cart" id="cart_ajax">

        </div>
    </div>
</div>

<!-- Slider -->
@yield('content')


<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Danh mục sản phẩm
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="{{route('home')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            Trang chủ
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="{{route('frontend_product.index')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            Sản phẩm
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="{{route('frontend_about.index')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            Bài viết
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="{{route('frontend_contact.index')}}" class="stext-107 cl7 hov-cl1 trans-04">
                            Liên hệ
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Help
                </h4>
                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    GET IN TOUCH
                </h4>

{{--                <p class="stext-107 cl7 size-201">--}}
{{--                    {{$contact->address}}<br>--}}
{{--                    {{$contact->phone_number}}<br>--}}
{{--                    {{$contact->email}}--}}
{{--                </p>--}}

                <div class="p-t-27">
                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-instagram"></i>
                    </a>

                    <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i class="fa fa-pinterest-p"></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Newsletter
                </h4>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email"
                               placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>

{{--        <div class="p-t-40">--}}
{{--            <div class="flex-c-m flex-w p-b-18">--}}
{{--                <a href="#" class="m-all-1">--}}
{{--                    <img src="{{asset('styleFrontend/images/icons/icon-pay-01.png')}}" alt="ICON-PAY">--}}
{{--                </a>--}}

{{--                <a href="#" class="m-all-1">--}}
{{--                    <img src="{{asset('styleFrontend/images/icons/icon-pay-02.png')}}" alt="ICON-PAY">--}}
{{--                </a>--}}

{{--                <a href="#" class="m-all-1">--}}
{{--                    <img src="{{asset('styleFrontend/images/icons/icon-pay-03.png')}}" alt="ICON-PAY">--}}
{{--                </a>--}}

{{--                <a href="#" class="m-all-1">--}}
{{--                    <img src="{{asset('styleFrontend/images/icons/icon-pay-04.png')}}" alt="ICON-PAY">--}}
{{--                </a>--}}

{{--                <a href="#" class="m-all-1">--}}
{{--                    <img src="{{asset('styleFrontend/images/icons/icon-pay-05.png')}}" alt="ICON-PAY">--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <p class="stext-107 cl6 txt-center">--}}
{{--                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                Copyright &copy;<script>document.write(new Date().getFullYear());</script>--}}
{{--                All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a--}}
{{--                        href="https://colorlib.com" target="_blank">Colorlib</a>--}}
{{--                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}

{{--            </p>--}}
{{--        </div>--}}
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->
<!--===============================================================================================-->
@include('frontend.inc.js')
<script>
    $(function () {
        addToCart();
        function addToCart() {
            $.ajax({
                type: 'GET',
                url: '{{route('ready_cart')}}',
                success: function (data) {
                    var rs = data;
                    if (rs.status === 1) {
                        $('#cart_ajax').html(rs.view);
                    } else {
                    }
                    $('#quantity_cart').attr('data-notify', rs.total_quantity);
                }
            });
        }
    })
</script>

</body>
</html>