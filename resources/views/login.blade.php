@extends('layouts.app')

@section('content')
    <div class="login-form">
       <h1>Войти</h1>
        <form action="{{ route('registration-form') }}" method="post">
            @csrf

            <label for="Email">Email</label>
            <input name="Email" id="Email" type="text" placeholder="Email">

            <label for="password">Password</label>
            <input name="password" type="text" placeholder="password" id="password">

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
