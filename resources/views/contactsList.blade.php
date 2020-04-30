@foreach($data as $el)
    <div>
        <h3>{{ $el->email }}</h3>
        <h3>{{ $el->password }}</h3>
    </div>
@endforeach
