@extends('layouts.app')

@section('content')
    <div class="login-form">
        <form action="{{ route('login-form') }}" method="post">
            @csrf

            <input name="login" id="login" type="text" placeholder="Логин">


            <input name="password" type="text" placeholder="Пароль" id="password">

            <button type="submit">ВОЙТИ</button>
        </form>


        <div class="sign-up-redirect">
            <span class="txt1">
							Don’t have an account?
						</span>
            <a class="txt2" href="#">
                Sign Up
            </a>
        </div>
    </div>

@endsection
