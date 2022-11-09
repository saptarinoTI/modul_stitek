<?php

namespace App\Http\Controllers;

use App\Models\Flipbook;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == 'mahasiswa') {
            $year = date('Y');
            $month = date('m');
            $mhs = Auth::user();
            $nim = substr($mhs->username, 0, 4);
            $result = (int)$year - (int)$nim;
            if ($month >= 1 && $month <= 6) {
                if ($result == 0) {
                    $smstr = 2;
                } else {
                    $smstr = $result * 2;
                }
            } elseif ($month >= 7 && $month <= 12) {
                $smstr = $result * 2 + 1;
            }
            $flipbooks = Flipbook::where('semester', '<=', $smstr)->get();
            return view('modul.index', compact('flipbooks'));
        } else {
            $flipbooks = Flipbook::all();
            return view('modul.index', compact('flipbooks'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
