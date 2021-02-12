@extends('layouts.app')

@section('title-block')
    Gallery
@endsection

@section('content')

    <form action="{{route('filterUsers')}}" METHOD="POST">
        @csrf
        <input name = "city" type="text" class="filter-input">
        <input type="submit" class="filter-submit" value="Поиск">
    </form>

@if($_GET['city'])

    <h2 class="filtered-heading">{{$_GET['city']}}</h2>
    @if($users->where('city', $_GET['city'])->where('sender', 1)->count() !=0)
        <div class="users">
            @foreach($users->where('city', $_GET['city'])->where('sender', 1) as $user)
                <div class="user">
                    <a href="{{route('strangersProfile', ['id' => $user->id])}}">{{$user->login}}</a>
                    <span>{{$user->name}}</span>
                </div>
            @endforeach
        </div>
    @else
    <div>Не найдено</div>
    @endif

@endif


@endsection
