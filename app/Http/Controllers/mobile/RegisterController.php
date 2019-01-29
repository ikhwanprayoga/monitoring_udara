<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function create_step2(Request $request)
    {
        return view('mobile.register.step1');
    }

}
