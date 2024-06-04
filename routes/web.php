<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/test-email', [RegisterController::class, 'sendTestEmail']);


Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
        Route::get('/admin-home', [AdminController::class, 'index'])
                ->name('admin.home');
        Route::get('/kelola-user', [AdminController::class, 'showUser'])
                ->name('user.kelola');
        Route::get('/kelola-guru', [AdminController::class, 'showGuru'])
                ->name('guru.kelola');
        Route::get('/kelola-siswa', [AdminController::class, 'showSiswa'])
                ->name('siswa.kelola');
        Route::get('/kelola-petugas', [AdminController::class, 'showPetugas'])
                ->name('petugas.kelola');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:siswa,guru,staff'])->group(function () {
        Route::get('/home', [ViewController::class, 'showHome']);
});
Route::get('/perpustakaan', [ViewController::class, 'showBuku'])
    ->name('perpus');
Route::get('/detail-buku', [ViewController::class, 'showDetailBuku'])
    ->name('detail.buku');
Route::get('/profile', [ViewController::class, 'showProfile'])
    ->name('profile');
Route::get('/edit-profile', [ViewController::class, 'showEditProfile'])
    ->name('edit.profile');
Route::get('/ubah-sandi', [ViewController::class, 'showKelolaSandi'])
    ->name('ubah.sandi');

require __DIR__.'/auth.php';
