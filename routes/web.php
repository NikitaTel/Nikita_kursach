<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/order-mask', function () {
    return view('order-mask');
})->name('order-mask');

Route::get('/questions', function () {
    return view('questions');
})->name('questions');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/registration/submit', function () {
    dd(Request::all());
})->name('registration-form');
