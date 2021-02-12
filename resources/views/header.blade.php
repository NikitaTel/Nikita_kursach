@section('header')

    <header>
        <ul>
            @if(\Illuminate\Support\Facades\Auth::check() ?? '')
            <li class="sign-in">
                <a href="{{route('profile')}}">хеллоу,{{\Illuminate\Support\Facades\Auth::user()->login}}
                    @if(\Illuminate\Support\Facades\Auth::user()->id_role ==1 && \App\Constructor::where('constructor_status','Анализ заказа')->count() !=0)
                        <span class="constructor-count">{{\App\Constructor::where('constructor_status','Анализ заказа')->count()}}</span>
                    @endif
                </a>
            </li>
            <li>
                <a  href="{{route('logoutUser')}}" class="sign-out">выйти</a>
            </li>


            @else
           <li>
               <a href="{{route('login')}}">войти</a>
           </li>

            @endif


        </ul>
    </header>

    <h1 class="main-title"><a href="{{route('home')}}">Belarus Delivery</a></h1>
