<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasAnyRole(['superadmin', 'operator'])) {
            return redirect()->route('beranda');
        } else if (Auth::user()) {
            // return redirect()->route('create.step2');
            return redirect()->route('mobile.beranda');
        }else {
            // return redirect()->route('base');
            return redirect('/guest');        
        }
        
    }
}
