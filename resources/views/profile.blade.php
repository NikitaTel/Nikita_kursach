@extends('layouts.app')

@section('content')
    @if($user->id_role ==1)

        <form class="admin-submit" method="post" action="{{route('addMask')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="admin-add">
                <div>
                    <label for="name">название маски</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="category">категория</label>
                    <input type="text" name="category" id="category" required>
                </div>
                <div>
                    <label for="price">цена</label>
                    <input type="text" name="price" id="price" required>
                </div>
                <div>
                    <label for="image">фото маски</label>
                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
                </div>
                <div>
                    <label for="qr">qr-код</label>
                    <input type="file" name="qr" id="qr" accept=".jpg, .jpeg, .png, .gif" required  >
                </div>
            </div>
            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors ->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input type="submit" value="Добавить">
        </form>

        <section class="admin-list">

            <ul class="order-headers">
                <li>Номер</li>
                <li>Статус</li>
                <li>Описание</li>
                <li>Прикреплённое фото</li>
            </ul>

            <ul class="constructors-list">
                @foreach(\App\Constructor::all() as $constructor)

                    <li  @if($constructor->constructor_status=='Подтверждён') style="background: #f8f8f8;" @endif>
                        <div>{{$constructor->id}}</div>
                        <div>{{$constructor->constructor_status}}</div>
                        <textarea class="constructors-list-description">
                            {{$constructor->constructor_description}}
                        </textarea>

                        <div>
                            <img width="203px" src="{{asset('/storage/' . $constructor->constructor_image)}}" alt="">
                        </div>
                    </li>
                        @if($constructor->constructor_status=='Анализ заказа')
                            <form action="{{route('changeStatus',['id'=>$constructor->id])}}" method="post">
                                @csrf

                                <input required type="text" placeholder="ввести цену" name="price" id="price" oninvalid="this.setCustomValidity('Wow!')">
                                <button type="submit">
                                    Подтвердить заказ
                                </button>
                            </form>
                        @endif



                @endforeach

            </ul>
        </section>


    @else
        <section class="user-constructor-list">
            <h1>Мои заказы</h1>
            <ul class="order-headers">
                <li>Статус</li>
                <li>Описание</li>
                <li>Приложение</li>
                <li>Цена</li>
            </ul>

            <ul class="constructors-list">
                @foreach(\App\Constructor::all() as $constructor)
                    @if($constructor->user_id==$user->id)
                        <li>
                            <div>{{$constructor->constructor_status}}</div>
                            <textarea class="constructors-list-description">
                                {{$constructor->constructor_description}}
                            </textarea>

                            <div>
                                <img width="150px" src="{{asset('/storage/' . $constructor->constructor_image)}}" alt="">
                            </div>


                            @if($constructor->constructor_price !=null)
                                <div>{{$constructor->constructor_price}} BYN</div>
                            @else
                                <div>Цена не определена</div>
                            @endif
                        </li>

                        @if($constructor->constructor_price !=null)
                            <a href="../images/camera_styles.png" download class="">Скачать инструкцию</a>
                        @endif
                    @endif
                @endforeach
            </ul>
        </section>
    @endif

@endsection
