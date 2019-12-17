@extends('frontend.layout.master')
@section('content')
    <div class="bg0 m-t-23 p-b-140">
        <div class="container">
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
                <form action="{{route('frontend_product.index')}}" >
                    <div class="panel-search w-full " style="width: 318px">
                        <div class="bor8 dis-flex p-l-15">
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="keyword" value="{{$keyword ? $keyword : ''}}"
                                   placeholder="Search">
                        </div>
                    </div>
                </form>
                <!-- Search product -->


                <!-- Filter -->
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
                            <div class="wrap-modal1 js-modal{{$product->id}} p-t-60 p-b-20">
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
                                                            &nbsp;<p>${{number_format($product->product_price)}}₫</p>
                                                        @else
                                                            <p style="color: red;"> &nbsp;${{number_format($product->product_price_discount)}}₫</p>&nbsp;&nbsp;<p style="text-decoration: line-through">${{number_format($product->product_price)}}₫</p>
                                                        @endif
                                                    </div>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        Màu:  {{$product->product_color}}
                                                    </p>
                                                    <p class="stext-102 cl3 p-t-23">
                                                        Xuất xứ:  {{$product->product_origin}}
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
                                                ${{number_format($product->product_price)}}₫
								            </span>
                                        @else
                                            <span class="stext-105 cl3" style="color: red;">
                                                ${{number_format($product->product_price_discount)}}₫
								            </span>
                                            <span class="stext-105 cl3" style="text-decoration: line-through">
                                                ${{number_format($product->product_price)}}₫
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
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
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
            <div style="position: relative">
                <div style="position: absolute;left: 50%">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection