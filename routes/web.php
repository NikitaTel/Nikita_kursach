<?php
namespace App\Http\Controllers\Auth;

use App\Deal;
use App\Deal_product;
use App\Mask;
use App\Partner;
use App\User;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/strangersProfile', function () {
    return view('strangersProfile', ['users' => User::all()]);
})->name('strangersProfile');

Route::get('/filter', function () {
    return view('filter', ['city'=>null,'users' => User::all()]);
})->name('filter');


Route::get('/order-mask', function () {
    return view('order-mask');
})->name('order-mask');

Route::get('/questions', function () {
    return view('questions');
})->name('questions');

Route::get('/selfi', function () {
    return view('selfi',['masks' => Mask::all(),'cartCount']);
})->name('selfi');


Route::get('/objects', function () {
    return view('objects',['masks' => Mask::all(),'cartCount']);
})->name('objects');

Route::get('/profile', function () {
        return view('profile',['deals' => Deal::all(), 'partners'=> Partner::all(), 'deal_products'=>Deal_product::all()]);
})->name('profile');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/cart-download', 'maskOrderController@order')->name('cart-download')->middleware('auth');

Route::get('/cart-payment', function () {
    return view('payment');
})->name('cart-payment');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logoutUser');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/profile/add', 'AddNewMask@add')->name('addMask');

Route::get('/add-to-cart/{id}', [
    'uses' => 'CartController@addToCart'
])->name('addToCart');

Route::get('/remove-from-cart/{id}', [
    'uses' => 'CartController@removeFromCart'
])->name('removeFromCart');

Route::post('/make-constructor{id}', 'AddConstructorController@add')->name('makeOrder')->middleware('auth');

Route::post('/change-status{id}', 'AddConstructorController@status')->name('changeStatus');
Route::post('/filteredUsers', 'FilterUsersController@filter')->name('filterUsers');

Route::post('/make_a_deal/{receiver_id}/{sender_id}/{city_from}', 'MakeADeal@deal')->name('make_a_deal')->middleware('auth');


Route::get('/delete-user{id}', 'DeleteUserController@delete')->name('removeUser');
