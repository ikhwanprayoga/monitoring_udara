<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use App\User;

class MemberController extends Controller
{
    public function cek($member)
    {
        $members = DB::table('push_subscriptions')->where('user_id', $member)->first();
        
        if ($members != null) {
            return 1;
        } else {
            return 0;
        }

        return response()->json($members, 200);
    }
}
