<?php

namespace App\Http\Controllers\mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class SettingController extends Controller
{
    public function index()
    {
        return view('mobile.setting.index');
    }

    public function update(Request $request, $id)
    {
        $input = $request->only('name', 'email', 'alamat');

        if ($request->password) {
            $input['password'] = bcrypt($request->password);
        }

        $data = User::find($id);
        $data->update($input);

        return redirect()->back()->with('message', 'Data telah diperbaharui');
    }
}
