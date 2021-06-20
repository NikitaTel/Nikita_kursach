<form action="{{route('filterUsers')}}" METHOD="POST" class="filter-users-form">
    @csrf
    <input placeholder="Город отправления" name = "city_from" type="text" class="filter-input" required>
    <input placeholder="Город доставки" name = "city_to" type="text" class="filter-input" required>
    <input type="submit" class="filter-submit" value="Поиск">
</form>
