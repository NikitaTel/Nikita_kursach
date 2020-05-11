@extends('layouts.app')

@section('cart')
    Cart
@endsection

@section('content')
    <section class="cart-pods">
        <ul>
            <li><a href="#" class="active-pod" >1. описание заказа</a></li>
            <li>2. оплата</li>
            <li>3. скачивание</li>
        </ul>
    </section>



    <section class="cart-products">
        <ul>
            <li>изображение</li>
            <li>название</li>
            <li>цена</li>
        </ul>
        @if(Session::has('cart'))
            @foreach((new App\Http\Controllers\CartController)->getCart()->items as $cart)
                @if($cart['item']['id'])
                <div class="cart-products-included">
                    <div class="cart-product-background"></div>
                    <div class="cart-product">

                        <div class="mask-mobile"><div class="mask-image" style="background: url('{{asset('/storage/' . $cart['item']->mask_img)}}');background-size: 100% 100%;"></div></div>
                        <div class="mask-name">{{$cart['item']['mask_name']}}</div>
                        <span class="price-mask">{{$cart['item']['price']}} BYN</span>
                        <a href="{{route('removeFromCart',['id' =>$cart['item']['id']])}}">
                            <div class="remove-cart">
                            </div>
                        </a>
                    </div>

                </div>
                @endif
            @endforeach
                <div class="cart-cost">Полная стоимость: <span class="cost">{{(new App\Http\Controllers\CartController)->getCart()->totalPrice}} BYN</span></div>
                <div class="cart-next"><a href="{{route('cart-payment')}}">Перейти к оплате</a></div>

        @else
            <div class="empty-cart">Корзина пуста, но вы можете это исправить</div>
        @endif

    </section>

@endsection
