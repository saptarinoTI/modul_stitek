<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('level', '!=', 'mahasiswa')->where('level', '!=', 'superadmin')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => 'required',
            "username" => 'required',
            "email" => 'required|email|unique:users,email',
            "password" => 'required',
            "level" => 'required|in:admin,laboran',
        ]);
        if ($validate) {
            User::create([
                'name' => htmlspecialchars(strtolower($request->name)),
                'username' => htmlspecialchars(strtolower($request->username)),
                'email' => htmlspecialchars(strtolower($request->email)),
                'password' => Hash::make($request->password),
                'level' => htmlspecialchars(strtolower($request->level)),
            ]);
            toast('Data User Login Berhasil Ditambahkan', 'success');
            return redirect()->route('users.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "name" => 'required',
            "username" => 'required',
            "email" => 'required',
            "level" => 'required|in:admin,laboran',
        ]);
        if ($request->password == null) {
            $password = $request->password_old;
        } else {
            $password = $request->password;
        }

        if ($validate) {
            $user = User::findOrFail($id);
            $user->update([
                'name' => htmlspecialchars(strtolower($request->name)),
                'username' => htmlspecialchars(strtolower($request->username)),
                'email' => htmlspecialchars(strtolower($request->email)),
                'password' => Hash::make($password),
                'level' => htmlspecialchars(strtolower($request->level)),
            ]);
            toast('Data User Login Berhasil Dirubah', 'success');
            return redirect()->route('users.index');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toast('Data User Login Berhasil Dihapuskan', 'success');
        return redirect()->route('users.index');
    }
}
