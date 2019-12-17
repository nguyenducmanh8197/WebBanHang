<ul class="header-cart-wrapitem w-full">
@foreach($cart as $item)
            <li class="header-cart-item flex-w flex-t m-b-12">
                <div class="header-cart-item-img">
                    <img src="{{asset($item['image'])}}" alt="IMG">
                </div>
                <div class="header-cart-item-txt p-t-8">
                        <span class="header-cart-item-name m-b-18 hov-cl1 trans-04">   {{$item['name']}} ({{$item['size_name']}})</span>
                    <span class="header-cart-item-info">
                        {{$item['quantity']}}  x  {{number_format($item['price'])}}₫
                    </span>
                </div>
            </li>
@endforeach

</ul>
<div class="w-full">
    <div class="header-cart-total w-full p-tb-40">
        Total: {{number_format($total)}} ₫
    </div>

    <div class="header-cart-buttons flex-w w-full">
        <a href="{{route('order.index')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
            Xem giỏ hàng
        </a>

    </div>
</div>

