@extends('layouts.app')

@section('title-block')
    Download
@endsection

@section('content')

    <section class="cart-pods">
        <ul>
            <li><a href="{{route('cart')}}">1. описание заказа</a></li>
            <li><a href="#">2. оплата</a></li>
            <li><a href="{{route('cart-download')}}">3. скачивание</a></li>
        </ul>
    </section>

    <section>
        <div class="cart-next"><a href="#">Перейти к оплате</a></div>
    </section>
@endsection
