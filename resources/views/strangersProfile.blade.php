@extends('layouts.app')

@section('title-block')
    Profile
@endsection

@section('content')

    <div class="user-profile">
        <img src="{{asset('images/profile.png')}}" alt="profile" class="user-profile-image">
        <div class="user-description">
            <span>Имя пользователя</span>
            <span>Имя</span>
            <span>Город</span>
            <span>Телефон</span>

            <span>{{$users->find($_GET['id'])->login}}</span>
            <span>{{$users->find($_GET['id'])->name}}</span>
            <span>{{$users->find($_GET['id'])->city}}</span>
            <span>+{{$users->find($_GET['id'])->phone_number}}</span>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check() ?? '')
        @if($_GET['id'] !=\Illuminate\Support\Facades\Auth::user()->id)
        <form action="{{route('make_a_deal', [\Illuminate\Support\Facades\Auth::user()->id, $_GET['id'], $users->find($_GET['id'])->city])}}" method="post" class="deal-form">
            @csrf
            <input type="text" name="description" placeholder="Описание заказа" required>
            <input type="text" name="price" placeholder="Цена за заказ" required>
            <input type="text" name="benefit" placeholder="Вознаграждение за заказ" required>
            <input type="text" name="city" placeholder="Город отправки" required>
            <input type="submit" value="Предложить сделку">
        </form>
    @endif
@endif

@endsection
