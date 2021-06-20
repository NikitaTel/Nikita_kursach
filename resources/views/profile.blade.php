@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
        <section class="result-section" style="margin-top: 30px;">
            <div class="result-header">
                <div>Логин</div>

                <div>Город</div>

                <div></div>
            </div>
            <div class="result-pods">
                @php
                    $users = \App\User::all();
                @endphp
                @foreach($users ?? '' as $company)

                    @if($company->role_id != 1)
                        <div class="result-pod">
                            <div> <a href="{{route('strangersProfile', ['id' => $company->id])}}">{{$company->login}}</a></div>
                            <div>{{$company->city}}</div>
                            <div>

                                <form action="{{route('removeUser', ['id'=>$company->id])}}">
                                    @csrf
                                    <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary submit">
                                                Удалить
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
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
                <span>{{\Illuminate\Support\Facades\Auth::user()->phone_number}}</span>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::user()->mark_count > 0)
            <h2 style="margin-top: 20px;">Ваша оценка: {{\Illuminate\Support\Facades\Auth::user()->mark}}</h2>
        @else
            <h2 style="margin-top: 20px;">У вас ещё нет оценок</h2>
        @endif
    <div>
        @if($partners->where('receiver_id', \Illuminate\Support\Facades\Auth::user()->id)->count() != 0)
            <h1>Все ваши предложения</h1>
            @foreach($partners as $partner)
                <h2 class="filtered-heading" style="margin: 20px 0;">{{\App\Deal::all()->find($partner->id)->city_from}} - > {{\App\Deal::all()->find($partner->id)->city_to}}</h2>
                <h2>{{\App\User::all()->find($partner->sender_id)->login}}</h2>
                <textarea  placeholder="Описание заказа"  name="description" id="description" cols="50" rows="10" required >{{\App\Deal_product::all()->find($partner->id)->product_description}}
             </textarea>
                <p>Стоимость товара: {{\App\Deal_product::all()->find($partner->id)->product_price}}</p>
                {{--                <button class="filter-submit">Принять предложение</button>--}}
            @endforeach
        @endif
        @if($partners->where('sender_id', \Illuminate\Support\Facades\Auth::user()->id)->count() != 0)
            <h1>Все ваши предложения</h1>
            @foreach($partners as $partner)
                <h2 class="filtered-heading" style="margin: 20px 0;">{{\App\Deal::all()->find($partner->id)->city_from}} - > {{\App\Deal::all()->find($partner->id)->city_to}}</h2>
                <h2>{{\App\User::all()->find($partner->receiver_id)->login}}</h2>
                <textarea  placeholder="Описание заказа"  name="description" id="description" cols="50" rows="10" required >{{\App\Deal_product::all()->find($partner->id)->product_description}}
             </textarea>
                <p>Стоимость товара: {{\App\Deal_product::all()->find($partner->id)->product_price}}</p>
                <p>Размер вознаграждения: {{\App\Deal_product::all()->find($partner->id)->benefit_price}}</p>
                <button class="filter-submit">Принять предложение</button>
                <button class="filter-submit">Отклонить предложение</button>
            @endforeach
        @endif
        @endif
    </div>

            @include('reviews_list')
    </script>
@endsection
