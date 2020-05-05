@section('header')

    <header>
        <ul>
            <li class="cart"><a href="{{route('cart')}}">корзина  @if(Session::has('cart'))
                <span class="cart-count">{{Session::get('cart')->totalQty}}</span>
                    @else
                        @endif</a></li>
            <li class="sign-in">
                @if($check ?? '')
                    <a href="{{route('profile')}}">хеллоу,{{$user->login}}</a>

                    <a  href="{{route('logoutUser')}}" class="sign-out">выйти</a>

                @else
                    <a href="{{route('login')}}">войти</a>
                @endif

            </li>
        </ul>
    </header>

    <h1 class="main-title"><a href="{{route('home')}}">TWINPIXEL</a></h1>
    <h3 class="spark-ar">SPARK AR STUDIO | 2020</h3>
