<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    public function delete(Request $request, $id) {
        User::all()->find($id)->delete();
        return redirect()->route('profile');
    }
}
