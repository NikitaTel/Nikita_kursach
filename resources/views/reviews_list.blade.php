@php
    $reviews =\App\Review::all()
        ->where('user_id',\Illuminate\Support\Facades\Auth::user()->id);

@endphp
@if (session('review_deleted'))
    <div class="alert alert-success green">
        Документ был удалён
    </div>
@endif
<div class="result-pods">
    @if (\Illuminate\Support\Facades\Auth::user()->role_id==2)
    <h1 class="profile-heading">Отзывы</h1>
    @endif
    @if($reviews!='' && $reviews!='[]')

        <ul>
            @foreach($reviews->where('user_id') ?? '' as $review)
                <li>
                    <a href="{{route('strangersProfile', ['id' => $review->reviewer_id])}}">
                        {{\App\User::find($review->reviewer_id)->login}}
                    </a>
                    @if($review->recommended=='on')
                        <img src="{{asset('images/up.jpg')}}" alt="up" width="30" style="margin-bottom: -6px; margin-left: 7px;">
                    @else
                        <img src="{{asset('images/down.jpg')}}" alt="up" width="20" style="margin-bottom: -6px; margin-left: 10px;">
                    @endif
                    <p>{{$review->review_content}}</p>
                    @if (\Illuminate\Support\Facades\Auth::user()->role_id==1)
                        <form action="{{route('delete_review', ['id'=>$review->id])}}">
                            @csrf
                            <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary add_gruz_submit">
                                        Удалить
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        @if (\Illuminate\Support\Facades\Auth::user()->role_id==2)
            <p style="margin: 1rem 0;">Отзывов пока нет</p>
            @endif
    @endif
</div>
