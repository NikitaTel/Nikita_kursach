@extends('layouts.app')

@section('title-block')
    Gallery
@endsection

@section('content')
    <section class="main-pods gallery">
        <div class="pod-wrapper">
            <div class="pod-image">
                <h3>СТИЛИ КАМЕРЫ</h3>
                <h3 class="opacity">КАМЕРЫ</h3>
            </div>
        </div>
        <div class="pod-wrapper">
                <div class="pod-image">
                    <h3>СЕЛФИ</h3>
                    <h3 class="opacity">СЕЛФИ</h3>
                </div>

        </div>
        <div class="pod-wrapper">
                <div class="pod-image">
                    <h3>ОБЪЕКТЫ</h3>
                    <h3 class="opacity">ОБЪЕКТЫ</h3>
                </div>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('questions')}}">
                <div class="pod-image">
                    <h3>ЧАСТЫЕ ВОПРОСЫ</h3>
                    <h3 class="opacity">ВОПРОСЫ</h3>
                </div>
            </a>
        </div>
    </section>


    <section class="catalog">
        <div class="catalog-element">
            <div class="mask-mobile"><div class="mask-image"></div></div>
            <div class="mask-wrapper">
                <div class="mask-description">
                    <div class="mask-name">TWINPIXEL</div>
                    <div class="cart-image">
                        <span class="price-mask">35 BYN</span>
                    </div>
                </div>
                <div class="mask-qr">
                    <div class="qr"></div>
                    <div class="try-it">
                        <span>попробовать в</span>
                        <span>Instagram</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
