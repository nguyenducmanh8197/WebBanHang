<?php
$user = \Illuminate\Support\Facades\Auth::user();
?>

@extends('frontend.layout.master')
@section('content')
    <form class="bg0 p-t-75 p-b-85" method="post" action="{{route('front_end.checkout')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class=""></th>
                                    <th class="text-center" style="width: 10%">Image</th>
                                    <th class="" style="width: 32%">Tên sản phẩm</th>
                                    <th class="text-center" >Giá (₫)</th>
                                    <th class=" text-center" style="width: 10%">Số lượng</th>
                                    <th class="" style="text-align: right;padding-right: 15px">Tổng (₫)</th>
                                </tr>
                                @foreach($order as $item)
                                    <tr class="table_row">
                                        <td class="text-center" >
                                            <a href="#" style="padding: 10px;color: red" id="remove-product{{$item['id']}}{{$item['size']}}"> <span class="fa fa-close"></a>
                                        </td>
                                        <td>
                                            <div class="how-itemcart1">
                                                <img src="{{asset($item['image'])}}" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="text-left"> {{$item['name']}}({{$item['size_name']}})</td>
                                        <td class="text-center"> {{number_format($item['price'])}}</td>
                                        <td class="text-center">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m onDownQuantity{{$item['id']}}{{$item['size']}}">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>
                                                <input class="mtext-104 cl3 txt-center num-product input-value-quantity{{$item['id']}}" type="number" name="num-product" value="{{$item['quantity']}}" >
                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m onUpQuantity{{$item['id']}}{{$item['size']}}">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="" style="text-align: right;padding-right: 15px" id="price{{$item['id']}}{{$item['size']}}"> {{number_format($item['quantity']*$item['price'])}}</td>
                                    </tr>
                                    <script>
                                        $(function () {
                                            $.ajaxSetup({
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                }
                                            });
                                            function formatNumber(num) {
                                                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
                                            }
                                            function updateOrder(id,size) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '{{route('update_order_plus')}}',
                                                    data: {id: id,size:size},
                                                    success: function (data) {
                                                        var rs = data;
                                                        if (rs.status === 1) {
                                                            $('#price'+ id + size).html(formatNumber(rs.total));
                                                            $('#total_price').html(formatNumber(rs.total_price));
                                                            $('#total_price_tax').html(formatNumber(rs.total_price_tax));
                                                        } else {

                                                        }
                                                    }
                                                });
                                            }

                                            function updateOrderMimus(id,size) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '{{route('update_order_mimus')}}',
                                                    data: {id: id,size:size},
                                                    success: function (data) {
                                                        var rs = data;
                                                        if (rs.status === 1) {
                                                            $('#price'+ id+size).html(formatNumber(rs.total));
                                                            $('#total_price').html(formatNumber(rs.total_price));
                                                            $('#total_price_tax').html(formatNumber(rs.total_price_tax));
                                                        } else {

                                                        }
                                                    }
                                                });
                                            }

                                            var id = '{{$item['id']}}';
                                            var size ='{{$item['size']}}';
                                            function removeProduct(id,size){
                                                $.ajax({
                                                    type:'DELETE',
                                                    url:'{{route('remove_product')}}',
                                                    data:{id:id,size:size},
                                                    success:function (data) {
                                                        var rs = data;
                                                        if(rs.status === 1){
                                                            window.location.reload();
                                                        }
                                                    }
                                                })
                                            }
                                            $('#remove-product{{$item['id']}}{{$item['size']}}').on('click',function () {
                                                removeProduct(id,size)
                                            })
                                            $('.onDownQuantity{{$item['id']}}{{$item['size']}}').on('click', function (e) {
                                                updateOrderMimus(id,size);
                                            });

                                            $('.onUpQuantity{{$item['id']}}{{$item['size']}}').on('click', function () {
                                                updateOrder(id,size);
                                            })
                                        })
                                    </script>
                                    @endforeach

                            </table>
                        </div>
                    </div>
                    <div class="m-l-25 m-r--38 m-lr-0-xl" style="margin-top: 30px">
                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="desc" placeholder="Vui lòng nhập địa chỉ giao hàng cụ thể" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
                            </div>

                            <div class="size-209">
                                 <span class="mtext-110 cl2 " id="total_price">
									 {{number_format($total_price)}}
								</span>₫
                            </div>
                        </div>
                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
                            </div>
                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <div class="">
                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address_city" placeholder="Thành phố" required>
                                    </div>
                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone_number" placeholder="Số điện thoại" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
                            </div>

                            <div class="size-209 p-t-1">
                                 <span class="mtext-110 cl2" id="total_price_tax">
									 {{number_format($total_price_tax)}}
								</span>₫
                            </div>
                        </div>
                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection