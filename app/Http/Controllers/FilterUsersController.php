<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FilterUsersController extends Controller
{
    public function filter(Request $request) {

        return redirect()->route('filter', ['city' => $request->input('city')]);
    }
}
