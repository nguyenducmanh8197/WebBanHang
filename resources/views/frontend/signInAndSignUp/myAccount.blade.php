@extends('frontend.layout.master')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
             style="background-image: url({{asset('styleFrontend/images/bg-02.jpg')}});">
        <h2 class="ltext-105 cl0 txt-center">
           TÀI KHOẢN CỦA BẠN
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <form action="{{route('front_end.updateAccount',$users->id)}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-2"><span>Name:</span></div>
                    <div class="col-md-10">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
                                   type="text" name="name"
                                   placeholder="First and last name"
                                   value="{{$users ? $users->name :  (old('name') ? old('name') : '')}}"
                            >
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;"
                                  class="stext-111">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><span>Email:</span></div>
                    <div class="col-md-10">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30"
                                   type="email" name="email"
                                   placeholder="Your Email Address"
                                   value="{{$users ? $users->email :  (old('email') ? old('email') : '')}}"
                            >
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;"
                                  class="stext-111">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><span>SĐT:</span></div>
                    <div class="col-md-10">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone_number"
                                   placeholder="Phone number"
                                   value="{{$users ? $users->phone_number :  (old('phone_number') ? old('phone_number') : '')}}"
                            >
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;"
                                  class="stext-111">{{$errors->first('phone_number')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"><span>Address:</span></div>
                    <div class="col-md-10">
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <textarea class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" style="padding: 10px 63px"
                                      type="text" name="address"
                                      placeholder="Address"
                            >{{$users ? $users->address :  (old('address') ? old('address') : '')}}</textarea>
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red;display: block;margin-top: 10px;"
                                  class="stext-111">{{$errors->first('address')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                    CẬP NHẬT
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                                    <a href="{{route('logout')}}}" class="flex-c-m trans-04 p-lr-25" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style="color: white">Logout</a>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST"
                                          style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="container" style="margin-top: 30px">
            <div class="row">
                <div class="col-md-2"><span>Đơn hàng của bạn</span></div>
                <div class="col-md-10">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                            <tr class="table_head">
                                <th class="text-center"> #</th>
                                <th class="text-center">Mã đơn hàng</th>
                                <th class="text-center">Ngày mua</th>
                                <th class="text-center">Trạng thái đơn hàng</th>
                            </tr>
                            @foreach($order as $item)
                                <tr class="table_row">
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center"><a
                                                href="{{route('front_end.order_detail',$item->id)}}">{{$item->order_number}}</a>
                                    </td>
                                    <td class="text-center">{{date_format($item->created_time,'Y-m-d')}}</td>
                                    <td class="text-center">  @if($item->status == 0)
                                            <span class="badge badge-pill badge-dark">Đặt hàng</span>
                                        @elseif($item->status == 1)
                                            <span class="badge badge-pill badge-warning">Đang xử lí</span>
                                        @elseif($item->status == 2)
                                            <span class="badge badge-pill badge-info">Đang giao hàng</span>
                                        @elseif($item->status == 3)
                                            <span class="badge badge-pill badge-success">Thành công</span>
                                        @elseif($item->status == -1)
                                            <span class="badge badge-pill badge-danger">Hủy</span>
                                        @endif</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="display: flex;justify-content: center;margin-top: 30px">
                            {{$order->links()}}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection