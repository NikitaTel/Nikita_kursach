@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->id_role ==1)

    @else

        <div class="user-profile">
            <img src="{{asset('images/profile.png')}}" alt="profile" class="user-profile-image">
            <div class="user-description">
                <span>Имя пользователя</span>
                <span>Имя</span>
                <span>Город</span>
                <span>Телефон</span>

                <span>{{\Illuminate\Support\Facades\Auth::user()->login}}</span>
                <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                <span>{{\Illuminate\Support\Facades\Auth::user()->city}}</span>
                <span>+{{\Illuminate\Support\Facades\Auth::user()->phone_number}}</span>
            </div>
        </div>
        @if($partners->where('receiver_id', \Illuminate\Support\Facades\Auth::user()->id)->count() != 0)
            <h1>Все ваши предложения</h1>

            {{}}
        @endif
    @endif
    </script>
@endsection
