<form action="{{route('make_a_deal', [\Illuminate\Support\Facades\Auth::user()->id, $_GET['id'], $users->find($_GET['id'])->city])}}" method="post" class="deal-form">
    @csrf
    <textarea  placeholder="Описание заказа"  name="description" id="description" cols="50" rows="10" required></textarea>

    <input type="hidden" name="sender_id" value="{{ $_GET['id'] }}">
    <input type="hidden" value="{{$_SERVER['REQUEST_URI']}}" name="url">
    <input type="text" name="price" placeholder="Цена за заказ" required>
    <input type="text" name="benefit" placeholder="Вознаграждение за заказ" required>
    <input type="submit" value="Предложить сделку">
</form>
