<?php

namespace App\Http\Controllers;

use App\Document;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddMark extends Controller
{
    public function add(Request $request) {
//        DB::table('users')
//            ->where('id', $request->input('user_id'))
//            ->update(['votes' => 1]);

        $user = User::all()->find($request->input('user_id'));
        $new_mark= ($user->mark_summary+$request->input('mark'))/($user->mark_count + 1);
        $user->update(['mark' => $new_mark]);
        $user->update(['mark_count' => $user->mark_count + 1]);
        $user->update(['mark_summary' => $user->mark_summary + $request->input('mark')]);
        return redirect($request->input('url'))->with('mark_success', true);
    }
}
