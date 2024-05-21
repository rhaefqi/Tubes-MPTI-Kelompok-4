<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [ViewController::class, 'showHome']);
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
