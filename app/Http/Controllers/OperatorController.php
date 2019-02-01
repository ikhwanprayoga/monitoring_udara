<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Image;
use DB;

use App\User;

class OperatorController extends Controller
{
    public function index()
    {
        $data = User::all();
        $role = Role::all();
        $subscriber = DB::table('push_subscriptions')->join('users', 'push_subscriptions.user_id', '=', 'users.id')->select(['user_id'])->get();
        
        return view('backend.operator.index', compact('data', 'role', 'subscriber'));
    }

    public function tambah(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'foto' => 'required|mimes:jpeg,jpg,png|max:3000',
            'role' => 'required',
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

        $simpan->assignRole($request['role']);

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
            
            if (is_file('file/operator/'.$operator->foto)) {
                unlink('file/operator/'.$operator->foto);
            }
            
            $foto_name = date('Ymdhis').$request['name'].'.jpg';
            $file_name = str_replace(' ', '', $foto_name);
            $operator->foto = $file_name;

            Image::make($request['foto'])->resize(300, 300)->save('file/operator/'.$file_name);

        }
        $operator->save();
        
        if ($request['role']) {
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $operator->assignRole($request['role']);
        }

        return redirect()->back()->with('ubah', true);
    }

    public function hapus(Request $request, $id)
    {
        $operator = User::find($id);
        $file_foto = $operator->foto;
        
        if (is_file('file/operator/'.$file_foto)) {
            unlink('file/operator/'.$operator->foto);
        }

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $operator->delete();
        
        return redirect()->back()->with('hapus', true);
    }
}
