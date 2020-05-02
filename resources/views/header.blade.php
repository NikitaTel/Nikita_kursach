@section('header')

    <header>
        <ul>
            <li class="cart"><a href="{{route('cart')}}">корзина</a></li>
            <li class="sign-in">
                @if($check ?? '')
                    <a href="{{route('profile')}}">хеллоу,{{$user->login}}</a>

                    <a  href="{{route('logoutUser')}}" class="sign-out">Выйти</a>

                @else
                    <a href="{{route('login')}}">войти</a>
                @endif

            </li>
        </ul>
    </header>

    <h1 class="main-title"><a href="{{route('home')}}">TWINPIXEL</a></h1>
    <h3 class="spark-ar">SPARK AR STUDIO | 2020</h3>
