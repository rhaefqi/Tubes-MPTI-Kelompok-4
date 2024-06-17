<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
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
        Route::get('/kelola-kelas-siswa', [AdminController::class, 'showKelas'])
                ->name('kelas-siswa.kelola');
});

Route::middleware(['auth', 'verified', 'role:pegawai'])->group(function () {
    Route::get('/pegawai-home', [PegawaiController::class, 'index'])
            ->name('pegawai.home');
    Route::get('/absensi', [PegawaiController::class, 'absensi'])
            ->name('absensi');
    Route::get('/peminjaman', [PegawaiController::class, 'peminjaman'])
            ->name('peminjaman');
    Route::get('/pengembalian', [PegawaiController::class, 'pengembalian'])
            ->name('pengembalian');
    Route::get('/kelola-buku', [PegawaiController::class, 'showBuku'])
            ->name('buku.kelola');
    Route::get('/edit-buku/{id}', [PegawaiController::class, 'showEditBuku'])
            ->name('buku.edit');
    Route::get('/kelola-subjek', [PegawaiController::class, 'showsubjek'])
            ->name('subjek.kelola');
     Route::get('/kategori', [PegawaiController::class, 'showkategori'])
            ->name('kategori.kelola');
    Route::get('/kelola-kategori', [PegawaiController::class, 'showKategori'])
            ->name('kategori.kelola');
    Route::get('/kelola-riwayat', [PegawaiController::class, 'showRiwayat'])
            ->name('riwayat.kelola');
    Route::get('/manajemen-peminjaman', [PegawaiController::class, 'showPeminjaman'])
            ->name('peminjaman.manajemen');
 Route::get('/kelola-buku-tambah', [PegawaiController::class, 'showTambahbuku'])
            ->name('buku.tambah');
Route::get('/manajemen-peminjaman(tambah)', [PegawaiController::class, 'showTambahdata'])
            ->name('buku.tambahdata');

});

Route::get('/dashboard', function () {
        return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:siswa,guru,staff,pegawai'])->group(function () {
        Route::get('/home', [ViewController::class, 'showHome']);
        Route::get('/perpustakaan', [ViewController::class, 'showBuku'])
                ->name('perpus');
        Route::get('/detail-buku/{id}', [ViewController::class, 'detailBuku'])
                ->name('detail.buku');
        Route::get('/profile', [ViewController::class, 'showProfile'])
                ->name('profile');
        Route::get('/edit-profile', [ViewController::class, 'showEditProfile'])
                ->name('edit.profile');
        Route::get('/ubah-sandi', [ViewController::class, 'showKelolaSandi'])
                ->name('ubah.sandi');
});

require __DIR__ . '/auth.php';
