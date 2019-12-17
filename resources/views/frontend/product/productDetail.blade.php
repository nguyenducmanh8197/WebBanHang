@extends('frontend.layout.master')
@section('content')
    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
{{--                                <ul class="slick3-dots" role="tablist" style="">--}}
{{--                                    <li class="slick-active" role="presentation">--}}
{{--                                        <img src="{{asset($product_detail->product_image2)}}">--}}
{{--                                        <div class="slick3-dot-overlay"></div>--}}
{{--                                    </li>--}}
{{--                                    <li role="presentation"><img src="{{asset($product_detail->product_image3)}}">--}}
{{--                                        <div class="slick3-dot-overlay"></div>--}}
{{--                                    </li>--}}
{{--                                    <li role="presentation"><img src="{{asset($product_detail->product_image4)}}">--}}
{{--                                        <div class="slick3-dot-overlay"></div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1800px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                             data-thumb="{{asset($product_detail->product_image2)}}"
                                             data-slick-index="0"
                                             aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10"
                                             style="width: 600px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{asset($product_detail->product_image2)}}" alt="IMG-PRODUCT">
                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="{{asset($product_detail->product_image2)}}" tabindex="0">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item-slick3 slick-slide"
                                             data-thumb="{{asset($product_detail->product_image3)}}"
                                             data-slick-index="1" aria-hidden="true" tabindex="-1" role="tabpanel"
                                             id="slick-slide11" aria-describedby="slick-slide-control11"
                                             style="width: 600px; position: relative; left: -600px; top: 0px; z-index: 998; opacity: 0;">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{asset($product_detail->product_image3)}}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="{{asset($product_detail->product_image3)}}" tabindex="-1">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="item-slick3 slick-slide"
                                             data-thumb="{{asset($product_detail->product_image4)}}"
                                             data-slick-index="2" aria-hidden="true" tabindex="-1" role="tabpanel"
                                             id="slick-slide12" aria-describedby="slick-slide-control12"
                                             style="width: 600px; position: relative; left: -1200px; top: 0px; z-index: 998; opacity: 0;">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{asset($product_detail->product_image4)}}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="{{asset($product_detail->product_image4)}}" tabindex="-1">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{$product_detail->product_name}}
                        </h4>
                        <div class="mtext-106 cl2">
                            Giá:
                            @if($product_detail->product_price_discount == 0)
                                <span class="stext-106 cl3">
                                                ${{number_format($product_detail->product_price)}}₫
								            </span>
                            @else
                                <span class="stext-106 cl3" style="color: red;">
                                                ${{number_format($product_detail->product_price_discount)}}₫
								            </span>
                                <span class="stext-106 cl3" style="text-decoration: line-through">
                                                ${{number_format($product_detail->product_price)}}₫
								            </span>
                            @endif
                        </div>
                        <div class="mtext-106 cl2" style="margin-top: 20px">
                            Màu:   <span class="stext-106 cl3">{{$product_detail->product_color}}</span>
                        </div>
                        <p class="stext-102 cl3 p-t-23">
                            {{$product_detail->product_title}}
                        </p>
                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>
                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="size"
                                                id="option-size">
                                            <option value="" selected>Chọn size
                                            </option>
                                            @foreach($product_size as $item)
                                                <option value="{{$item->size_id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <small class="error_size hidden"
                                           style="color: red"></small>
                                </div>
                            </div>
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Số lượng
                                </div>
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m onDownQuantity">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input class="mtext-104 cl3 txt-center num-product input-value-quantity"
                                               type="number" name="num-product" value="1">
                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m onUpQuantity">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04  add-to-cart">
                                        Thêm vào giỏ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {!! $product_detail->product_desc !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Sản phẩm liên quan
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2 slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track"
                             style="opacity: 1; width: 2760px; transform: translate3d(0px, 0px, 0px);">
                            @foreach($product_relate as $item)
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 slick-slide slick-current slick-active"
                                     data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 345px;">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="{{asset($item->product_image)}}" alt="IMG-PRODUCT">
                                        </div>
                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="{{route('frontend_product_detail.show',$item->id)}}"
                                                   class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
                                                    {{$item->product_name}}
                                                </a>

                                                <div>
                                                    @if($item->product_price_discount == 0)
                                                        <span class="stext-105 cl3">
                                                ${{number_format($item->product_price)}}₫
								            </span>
                                                    @else
                                                        <span class="stext-105 cl3" style="color: red;">
                                                ${{number_format($item->product_price_discount)}}₫
								            </span>
                                                        <span class="stext-105 cl3"
                                                              style="text-decoration: line-through">
                                                ${{number_format($item->product_price)}}₫
								            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#option-size').change(function () {
            $('.error_size').addClass('hidden');
        });
        $('.add-to-cart').click(function (e) {
            var id = '{{$product_detail->id}}';
            var quantity = $('.input-value-quantity').val();
            var size = $('#option-size option:selected').val();
            e.preventDefault();
            addToCart(id, quantity, size);
        });

        function addToCart(id, quantity, size) {
            $.ajax({
                type: 'POST',
                url: '{{route('add_to_cart')}}',
                data: {id: id, quantity: quantity, size: size},
                success: function (data) {
                    var rs = data;
                    if (rs.status === 1) {
                        $('#cart_ajax').html(rs.view);
                        $('#quantity_cart').attr('data-notify', rs.total_quantity);
                    } else {
                        if (typeof rs.error !== 'undefined') {
                            var key = '';
                            for (key in data.error) {
                                $('.error_' + key).removeClass('hidden').html(data.error[key]);
                            }
                        } else {
                            $('.error_size').removeClass('hidden').addClass('text-danger').html(rs.msg);
                        }
                    }
                }
            });
        }
    </script>
    <script>
        $(function () {
            var show_error = $('.show-validate{{$product_detail->id}}');
            show_error.addClass('hidden');
            $('.onDownQuantity').on('click', function (e) {
                $('.error_size').addClass('hidden');
            });
            $('.onUpQuantity').on('click', function (e) {
                $('.error_size').addClass('hidden');
            })
        })
    </script>
@endsection