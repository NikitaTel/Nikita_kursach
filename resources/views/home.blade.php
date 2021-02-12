<!doctype html>
<html lang="en" id="home-page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belarus Delivery</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

@include('header')
@include('inc.messages')

<main>
    <form action="{{route('filterUsers')}}" METHOD="POST">
        @csrf
        <input name = "city" type="text" class="filter-input">
        <input type="submit" class="filter-submit" value="Поиск">
    </form>
</main>
