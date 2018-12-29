<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Image;

use App\User;

class OperatorController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('backend.operator.index', compact('data'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'foto' => 'required|mimes:jpeg,jpg,png|max:3000',
        ]);

        $input = $request->only(['name', 'email', 'password', 'foto']);
        $foto_name = date('Ymdhis').$input['name'].'.jpg';
        $file_name = str_replace(' ', '', $foto_name);
        
        $simpan = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'foto' => $file_name
        ]);

        Image::make($request->foto)->resize(300, 300)->save('file/operator/'.$file_name);

        return redirect()->back()->with('tambah', true);
    }

    public function ubah(Request $request, $id)
    {
        $operator = User::find($id);

        $this->validate($request, [
            'name' => 'required|string|max:50',
        ]);

        $operator->name = $request['name'];
        $operator->email = $request['email'];

        if ($request['password']) {
            $this->validate($request, [
                'password' => 'required|string|min:6',
            ]);
            $operator->password = Hash::make($request['password']);
        }

        if ($request['foto']) {
            $this->validate($request, [
                'foto' => 'required|mimes:jpeg,jpg,png|max:3000',
            ]);

            unlink('file/operator/'.$operator->foto);
            
            $foto_name = date('Ymdhis').$request['name'].'.jpg';
            $file_name = str_replace(' ', '', $foto_name);
            $operator->foto = $file_name;

            Image::make($request['foto'])->resize(300, 300)->save('file/operator/'.$file_name);

        }

        $operator->save();

        return redirect()->back()->with('ubah', true);
    }

    public function hapus($id)
    {
        $operator = User::find($id);
        unlink('file/operator/'.$operator->foto);
        $operator->delete();
        
        return redirect()->back()->with('hapus', true);
    }
}
