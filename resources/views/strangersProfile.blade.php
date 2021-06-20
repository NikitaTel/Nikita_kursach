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
                <span>{{$users->find($_GET['id'])->phone_number}}</span>
            </div>
        </div>
        @if(\App\User::all()->find($_GET['id'])->mark_count > 0)
            <h2 style="margin-top: 20px;">Оценка пользователя: {{\App\User::all()->find($_GET['id'])->mark}}</h2>
            <p>оценок: {{\App\User::all()->find($_GET['id'])->mark_count}}</p>
        @else
            <h2 style="margin-top: 20px;">У пользователя ещё нет оценок</h2>
        @endif

        @if($_GET['id'] !=\Illuminate\Support\Facades\Auth::user()->id)
            @include('forms.dealForm')
        @endif

        @if (\Illuminate\Support\Facades\Auth::user()->role_id==2)
            <div>
                <h1>Добавить Отзыв</h1>
                <form method="POST" action="{{ route('addReview') }}">
                    @csrf

                    <input type="hidden" value="{{$_GET['id']}}" name="user_id">
                    <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                    <div class="form-group row ">
                        <div class="col-md-6 add-review">
                            <label for="recommended" class="sender-label">Рекомендуете?</label>

                            <input name="recommended" type="hidden">
                            <input id="recommended" type="checkbox" class="form-control style-input" name="recommended">

                            @error('recommended')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>
                    <textarea name="review_content" id="review_content" cols="70" rows="10" placeholder="Оставьте ваш отзыв"
                              required></textarea>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary submit">
                                Оставить отзыв
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div>
                <h1>Оставить оценку</h1>
                <form method="POST" action="{{ route('addMark') }}">
                    @csrf

                    <input type="hidden" value="{{$_GET['id']}}" name="user_id">
                    <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                    <div class="form-group row ">
                        <div class="col-md-6 add-review">
                            <select name="mark" id="mark" style="    padding: 5px 10px;
    border: 1px;
    border-radius: 7px;
    outline: none;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                            @error('recommended')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary submit">
                                Оставить оценку
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif

    @include('reviews_list_unauth')
@endsection
