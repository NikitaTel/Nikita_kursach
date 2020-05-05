@extends('layouts.app')

@section('content')
    @if($user->id_role ==1)

        <form class="admin-submit" method="post" action="{{route('addMask')}}">
            @csrf
            <div class="admin-add">
                <div>
                    <label for="name">название маски</label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="category">категория</label>
                    <input type="text" name="category" id="category">
                </div>
                <div>
                    <label for="price">цена</label>
                    <input type="text" name="price" id="price">
                </div>
            </div>


            <input type="submit" value="Добавить">
        </form>
    @endif

@endsection
