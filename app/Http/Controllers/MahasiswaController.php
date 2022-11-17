<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'kelas' => 'required|in:pagi,sore',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);
        Mahasiswa::create($request->all());
        User::create([
            'username' => $request->nim,
            'name' => $request->nama,
            'password' => Hash::make('mahasiswa'),
            'level' => 'mahasiswa',
        ]);
        return redirect()->route('mahasiswa.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit', compact('mhs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required|in:pagi,sore',
            'ttl' => 'required',
            'alamat' => 'required',
        ]);
        $mhs = Mahasiswa::where('nim', $id)->first();
        $mhs->update($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id)
    {
        $mhs = Mahasiswa::where('nim', $id)->first();
        $user = User::where('username', $id)->first();
        $user->delete();
        $mhs->delete();
        return redirect()->route('mahasiswa.index');
    }
}
