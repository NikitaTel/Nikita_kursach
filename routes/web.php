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


Route::get('/profile', function () {
        return view('profile',['deals' => Deal::all(), 'partners'=> Partner::all(), 'deal_products'=>Deal_product::all()]);
})->name('profile');


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logoutUser');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/profile/add', 'AddNewMask@add')->name('addMask');


Route::post('/change-status{id}', 'AddConstructorController@status')->name('changeStatus');
Route::post('/filteredUsers', 'FilterUsersController@filter')->name('filterUsers');

Route::post('/make_a_deal/{receiver_id}/{sender_id}/{city_from}', 'MakeADeal@deal')->name('make_a_deal')->middleware('auth');


Route::get('/delete-user{id}', 'DeleteUserController@delete')->name('removeUser');
Route::post('/add_review', 'AddReview@add')->name('addReview')->middleware('auth');
Route::post('/add_mark', 'AddMark@add')->name('addMark')->middleware('auth');
