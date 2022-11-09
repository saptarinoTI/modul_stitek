<?php

use App\Http\Controllers\FlipbookController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UserController;
use App\Models\Mahasiswa;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->level == 'mahasiswa') {
        $year = date('Y');
        $month = date('m');
        $mhs = auth()->user();
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
        $modul = Modul::where('semester', '=', $smstr)->get();
        return view('dashboard', compact('modul'));
    } else {
        $user = User::where('level', '!=', 'mahasiswa')->where('level', '!=', 'superadmin')->get();
        $mahasiswa = Mahasiswa::all();
        $modul = Modul::all();
        return view('dashboard', compact('user', 'mahasiswa', 'modul'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('modul', ModulController::class);
    Route::resource('flipbook', FlipbookController::class);
});

require __DIR__ . '/auth.php';
