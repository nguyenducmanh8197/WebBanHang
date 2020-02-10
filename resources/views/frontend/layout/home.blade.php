@extends('frontend.layout.master')
@section('content')
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">
                @foreach($slides as $slide)
                    <div class="item-slick1" style="background-image: url({{asset($slide->image)}});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown"
                                     data-delay="0">
								<span class="ltext-101 cl2 respon2" style="font-size: 36px;color: white">
									{{$slide->title}}
								</span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                     data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1"style="font-size: 30px;color: white">
                                        {!! $slide->content !!}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{route('frontend_product.index')}}"
                                       class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('styleFrontend/images/banner-06.jpg')}}" alt="IMG-BANNER">
                        <a href="{{route('frontend_product.index')}}"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Bag
								</span>

                                <span class="block1-info stext-102 trans-04">
									Spring 2019
								</span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('styleFrontend/images/banner-02.jpg')}}" alt="IMG-BANNER">

                        <a href="{{route('frontend_product.index')}}"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Men
								</span>

                                <span class="block1-info stext-102 trans-04">
									Spring 2019
								</span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('styleFrontend/images/banner-03.jpg')}}" alt="IMG-BANNER">
                        <a href="{{route('frontend_product.index')}}"
                           class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Accessories
								</span>

                                <span class="block1-info stext-102 trans-04">
									New Trend
								</span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Product sale-->
    <section class="bg0 p-t-23">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Sản phẩm bán chạy
                </h3>
            </div>

            <div class="row">
                @foreach($products_sale as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{asset($product->product_image)}}" alt="IMG-PRODUCT">
                                <a href="#"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal{{$product->id}}">
                                    Quick View
                                </a>
                            </div>
                            {{--                            modal--}}
                            <div class="wrap-modal1 js-modal{{$product->id}} p-t-60 p-b-20" id="hideModal">
                                <div class="overlay-modal1 js-hide-modal{{$product->id}}"></div>
                                <div class="container">
                                    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-7 p-b-30">
                                                <div class="p-l-25 p-r-30 p-lr-0-lg">
                                                    <div class="wrap-slick3 flex-sb flex-w">
                                                        <div class="wrap-slick3-dots"></div>
                                                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                                                        <div class="slick3 gallery-lb">
                                                            <div class="item-slick3"
                                                                 data-thumb="{{asset($product->product_image2)}}">
                                                                <div class="wrap-pic-w pos-relative">
                                                                    <img src="{{asset($product->product_image2)}}"
                                                                         alt="IMG-PRODUCT">
                                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                       href="{{asset($product->product_image2)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="item-slick3"
                                                                 data-thumb="{{asset($product->product_image3)}}">
                                                                <div class="wrap-pic-w pos-relative">
                                                                    <img src="{{asset($product->product_image3)}}"
                                                                         alt="IMG-PRODUCT">

                                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                       href="{{asset($product->product_image3)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="item-slick3"
                                                                 data-thumb="{{asset($product->product_image4)}}">
                                                                <div class="wrap-pic-w pos-relative">
                                                                    <img src="{{asset($product->product_image4)}}"
                                                                         alt="IMG-PRODUCT">

                                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                       href="{{asset($product->product_image4)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5 p-b-30">
                                                <div class="p-r-50 p-t-5 p-lr-0-lg">
                                                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                                        {{$product->product_name}}
                                                    </h4>
                                                    <div class="mtext-106 cl2" style="display: flex">
                                                        Giá:   @if($product->product_price_discount == 0)
                                                            &nbsp;<p>{{number_format($product->product_price)}}</p>₫
                                                        @else
                                                            <p style="color: red;"> &nbsp;{{number_format($product->product_price_discount)}}₫</p>&nbsp;&nbsp;<p style="text-decoration: line-through">{{number_format($product->product_price)}}₫</p>
                                                        @endif
                                                    </div>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        Màu: {{$product->product_color}}
                                                    </p>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        Xuất xứ: {{$product->product_origin}}
                                                    </p>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        {{$product->product_title}}
                                                    </p>
                                                    <a href="{{route('frontend_product_detail.show',$product->id)}}">
                                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="margin-top: 25px">
                                                            Chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                            ----}}
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{route('frontend_product_detail.show',$product->id)}}"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->product_name}}
                                    </a>
                                    <div>
                                        @if($product->product_price_discount == 0)
                                            <span class="stext-105 cl3">
                                                {{number_format($product->product_price)}}₫
								            </span>
                                        @else
                                            <span class="stext-105 cl3" style="color: red;">
                                                {{number_format($product->product_price_discount)}}₫
								            </span>
                                            <span class="stext-105 cl3" style="text-decoration: line-through">
                                                {{number_format($product->product_price)}}₫
								            </span>
                                        @endif
                                    </div>
                                </div>

                                <input type="text" class="product_quantity_{{$product->id}}"
                                       value="{{$product->product_quantity}}" hidden>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function () {
                            $('.js-show-modal{{$product->id}}').on('click', function (e) {
                                e.preventDefault();
                                $('.js-modal{{$product->id}}').addClass('show-modal1');
                            });
                            $('.js-hide-modal{{$product->id}}').on('click', function () {
                                $('.js-modal{{$product->id}}').removeClass('show-modal1');
                            });
                        })
                    </script>

                @endforeach
            </div>
            <!-- Load more -->
        </div>

    </section>
    <!-- Product new-->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                   Sản phẩm mới
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Tất cả
                    </button>
                    @foreach($productCategorys as $productCategory)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                                data-filter=".{{$productCategory->code}}">
                            {{$productCategory->name}}
                        </button>
                    @endforeach
                </div>

                <!-- Search product -->
            </div>

            <div class="row isotope-grid">
                @foreach($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->code}}">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{asset($product->product_image)}}" alt="IMG-PRODUCT">
                                <a href="#"
                                   class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal{{$product->id}}">
                                    Quick View
                                </a>
                            </div>
                            {{--                            modal--}}
                            <div class="wrap-modal1 js-modal{{$product->id}} p-t-60 p-b-20" id="hideModal">
                                <div class="overlay-modal1 js-hide-modal{{$product->id}}"></div>
                                <div class="container">
                                    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-7 p-b-30">
                                                <div class="p-l-25 p-r-30 p-lr-0-lg">
                                                    <div class="wrap-slick3 flex-sb flex-w">
                                                        <div class="wrap-slick3-dots"></div>
                                                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                                                        <div class="slick3 gallery-lb">
                                                            <div class="item-slick3"
                                                                 data-thumb="{{asset($product->product_image2)}}">
                                                                <div class="wrap-pic-w pos-relative">
                                                                    <img src="{{asset($product->product_image2)}}"
                                                                         alt="IMG-PRODUCT">
                                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                       href="{{asset($product->product_image2)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="item-slick3"
                                                                 data-thumb="{{asset($product->product_image3)}}">
                                                                <div class="wrap-pic-w pos-relative">
                                                                    <img src="{{asset($product->product_image3)}}"
                                                                         alt="IMG-PRODUCT">

                                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                       href="{{asset($product->product_image3)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="item-slick3"
                                                                 data-thumb="{{asset($product->product_image4)}}">
                                                                <div class="wrap-pic-w pos-relative">
                                                                    <img src="{{asset($product->product_image4)}}"
                                                                         alt="IMG-PRODUCT">

                                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                                       href="{{asset($product->product_image4)}}">
                                                                        <i class="fa fa-expand"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-5 p-b-30">
                                                <div class="p-r-50 p-t-5 p-lr-0-lg">
                                                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                                        {{$product->product_name}}
                                                    </h4>
                                                   <div class="mtext-106 cl2" style="display: flex">
                                                       Giá:   @if($product->product_price_discount == 0)
                                                           &nbsp;<p>{{number_format($product->product_price)}}</p>₫
                                                           @else
                                                               <p style="color: red;"> &nbsp;{{number_format($product->product_price_discount)}}₫</p>&nbsp;&nbsp;<p style="text-decoration: line-through">{{number_format($product->product_price)}}₫</p>
                                                           @endif
                                                   </div>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        Màu: {{$product->product_color}}
                                                    </p>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        Xuất xứ: {{$product->product_origin}}
                                                    </p>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        {{$product->product_title}}
                                                    </p>
                                                    <a href="{{route('frontend_product_detail.show',$product->id)}}">
                                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="margin-top: 25px">
                                                           Chi tiết
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                            ----}}
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{route('frontend_product_detail.show',$product->id)}}"
                                       class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $product->product_name}}
                                    </a>
                                    <div>
                                        @if($product->product_price_discount == 0)
                                            <span class="stext-105 cl3">
                                                {{number_format($product->product_price)}}₫
								            </span>
                                        @else
                                            <span class="stext-105 cl3" style="color: red;">
                                                {{number_format($product->product_price_discount)}}₫
								            </span>
                                            <span class="stext-105 cl3" style="text-decoration: line-through">
                                                {{number_format($product->product_price)}}₫
								            </span>
                                        @endif
                                    </div>
                                </div>

                                <input type="text" class="product_quantity_{{$product->id}}"
                                       value="{{$product->product_quantity}}" hidden>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(function () {
                            $('.js-show-modal{{$product->id}}').on('click', function (e) {
                                e.preventDefault();
                                $('.js-modal{{$product->id}}').addClass('show-modal1');
                            });
                            $('.js-hide-modal{{$product->id}}').on('click', function () {
                                $('.js-modal{{$product->id}}').removeClass('show-modal1');
                            });
                        })
                    </script>

                @endforeach
            </div>
            <!-- Load more -->
        </div>

    </section>

@endsection