<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\HomeController;

use App\Mask;
use App\Providers\RouteServiceProvider;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Boolean;

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
//,['user'=> Auth::user(),'check'=> Auth::check()]
Route::get('/gallery', function () {
    return view('gallery',['user'=> Auth::user(),'check'=> Auth::check(),
        'masks' => Mask::all(),'cartCount']);
})->name('gallery');

Route::get('/order-mask', function () {
    return view('order-mask');
})->name('order-mask');

Route::get('/questions', function () {
    return view('questions');
})->name('questions');

Route::get('/profile', function () {
        return view('profile');
})->name('profile');

Route::get('/cart', function () {
//    session()->forget('cart');
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
