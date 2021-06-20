@extends('layouts.app')

@section('title-block')
    Gallery
@endsection

@section('content')

    @include('filterForm')


@php
$filteredUsers = $users->where('city_to', $_GET['city_to'])->where('city', $_GET['city_from'])->where('sender', 'on');
@endphp

<h2 class="filtered-heading">{{$_GET['city_from']}} - > {{$_GET['city_to']}}</h2>
@if($filteredUsers->count() !=0)
    <div class="users">
        @foreach($filteredUsers as $user)
            <div class="user">
                <a href="{{route('strangersProfile', ['id' => $user->id])}}">{{$user->login}}</a>
                <span>{{$user->name}}</span><span style="color: green; margin-left: 20px;">Оценка: {{$user->mark}}/5</span>
            </div>
        @endforeach
    </div>
@else
<div>Не найдено</div>
@endif

@endsection
`
