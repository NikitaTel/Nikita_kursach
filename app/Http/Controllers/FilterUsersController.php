<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FilterUsersController extends Controller
{
    public function filter(Request $request) {

        return redirect()->route('filter', ['city_from' => $request->input('city_from'), 'city_to' => $request->input('city_to')]);
    }
}
