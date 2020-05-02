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

        <div class="cart-products-included">
            <div class="cart-product-background"></div>
            <div class="cart-product">
                <div class="mask-mobile"><div class="mask-image"></div></div>
                <div class="mask-name">TWINPIXEL</div>
                <span class="price-mask">35 BYN</span>
            </div>
        </div>


        <div class="cart-cost">Полная стоимость: <span class="cost">35 BYN</span></div>
        <div class="cart-next"><a href="{{route('cart-download')}}">Перейти к оплате</a></div>

    </section>

@endsection
