
@if($errors->any())
    <div class="alert">
        <ul>
            @foreach($errors ->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert">
        {{session('success')}}
    </div>
@endif
