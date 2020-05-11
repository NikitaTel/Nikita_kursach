<?php

namespace App\Http\Controllers;

use App\Mask;
use Illuminate\Http\Request;

class DeleteMaskController extends Controller
{
    public function delete(Request $request, $id) {
        Mask::all()->find($id)->delete();
        return redirect()->route('profile');
    }
}
