@extends('frontend.layout.master')
@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('styleFrontend/images/bg-01.jpg')}}');">
        <h2 class="ltext-105 cl0 txt-center">
            Contact
        </h2>
    </section>
    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{route('feedback.store')}}" id="second_form" data-parsley-validate="" novalidate="" method="post"  enctype="multipart/form-data" >
                        {{csrf_field()}}
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Gửi tin nhắn cho chúng tôi
                        </h4>
                        @if (Session::has('flash_message'))
                            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                            @elseif(Session::has('flash_message_er'))
                            <div class="alert alert-danger">{{ Session::get('flash_message_er') }}</div>
                        @endif
                        @if ( count($errors) > 0)
                            <span style="color:red">{{$errors->first('email')}}</span>
                        @endif
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Vui lòng nhập email của bạn" required>
                            <img class="how-pos4 pointer-none" src="{{asset('styleFrontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>
                        @if ( count($errors) > 0)
                            <span style="color:red">{{$errors->first('desc')}}</span>
                        @endif
                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="desc" placeholder="How Can We Help?" required></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
                            Submit
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Address
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                               {{$contact->address}}
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Phone
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +{{$contact->phone_number}}
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email
							</span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                {{$contact->email}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map -->
@endsection
@section('js')
    <script>
        $("document").ready(function(){
            setTimeout(function(){
                $("div.alert").remove();
            }, 3000 ); // 5 secs

        });

    </script>
@endsection