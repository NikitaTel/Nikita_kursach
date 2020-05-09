@extends('layouts.app')



@section('content')

    <section class="cart-pods">
        <ul>
            <li>1. описание заказа</li>
            <li><a href="#" class="active-pod" disabled>2. оплата</a></li>
            <li>3. скачивание</li>
        </ul>
    </section>

    <section class="cart-products payment">

        <div class="cart-cost">Сумма к оплате: <span class="cost">{{(new App\Http\Controllers\CartController)->getCart()->totalPrice}} BYN</span></div>

    </section>

    <section class="payment">
        <a href="{{route('cart-download')}}">Оплатить</a>
    </section>
@endsection
