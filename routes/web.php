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

Route::get('/gallery', function () {
    return view('gallery',['user'=> Auth::user(),'check'=> Auth::check(),
        'masks' => Mask::all(),'cartCount']);
})->name('gallery');

Route::get('/order-mask', function () {
    return view('order-mask',['user'=> Auth::user(),'check'=> Auth::check()]);
})->name('order-mask');

Route::get('/questions', function () {
    return view('questions',['user'=> Auth::user(),'check'=> Auth::check()]);
})->name('questions');

Route::get('/profile', function () {
        return view('profile',['user'=> Auth::user(),'check'=> Auth::check()]);
})->name('profile');

Route::get('/cart', function () {
//    session()->forget('cart');
    return view('cart',['user'=> Auth::user(),'check'=> Auth::check()]);

})->name('cart');

Route::get('/cart-download', function () {
    return view('cart-download',['user'=> Auth::user(),'check'=> Auth::check()]);
})->name('cart-download');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logoutUser');


Route::get('/', function () {
    return view('home',['user'=> Auth::user(),'check'=> Auth::check()]);
})->name('home');

Route::post('/profile/add', 'AddNewMask@add')->name('addMask');

Route::get('/add-to-cart/{id}', [
    'uses' => 'CartController@addToCart'
])->name('addToCart');

Route::get('/remove-from-cart/{id}', [
    'uses' => 'CartController@removeFromCart'
])->name('removeFromCart');

Route::post('/make-constructor{id}', 'AddConstructorController@add')->name('makeOrder');

Route::post('/change-status{id}', 'AddConstructorController@status')->name('changeStatus');
