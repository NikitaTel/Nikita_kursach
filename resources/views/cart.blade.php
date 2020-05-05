@extends('layouts.app')

@section('cart')
    Cart
@endsection

@section('content')
    <section class="cart-pods">
        <ul>
            <li><a href="{{route('cart')}}">1. описание заказа</a></li>
            <li>2. оплата</li>
            <li>3. скачивание</li>
        </ul>
    </section>



    <section class="cart-products">
        @if(Session::has('cart'))
            @foreach((new App\Http\Controllers\CartController)->getCart()->items as $cart)
                <div class="cart-products-included">
                    <div class="cart-product-background"></div>
                    <div class="cart-product">
                        <span>{{$cart['qty']}}</span>
                        <div class="mask-mobile"><div class="mask-image" style="background: url('{{$cart['item']['mask_img']}}');background-size: 100% 100%;"></div></div>
                        <div class="mask-name">{{$cart['item']['mask_name']}}</div>
                        <span class="price-mask">{{$cart['item']['price']}} BYN</span>
                    </div>
                    <a href="{{route('removeFromCart',['id' =>$cart['item']['id']])}}">Удалить</a>
                    <span class="cart-subtotal">{{$cart['price']}}</span>
                </div>

            @endforeach
                <div class="cart-cost">Полная стоимость: <span class="cost">{{(new App\Http\Controllers\CartController)->getCart()->totalPrice}} BYN</span></div>
                <div class="cart-next"><a href="{{route('cart-download')}}">Перейти к оплате</a></div>

        @else
            <div class="empty-cart">Корзина пуста</div>
        @endif



    </section>

@endsection
