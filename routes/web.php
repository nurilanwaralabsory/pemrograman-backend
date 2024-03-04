<?php

use App\Models\Buku;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'kategori' => Category::count(),
        'buku' => Buku::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Jalur ini diizinkan untuk user yang sudah login dan untuk user yang rolenya itu user dan admin
Route::middleware(['auth', 'role:user,admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// jalur yang ini khusu untuk role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('buku', BukuController::class);
});

Route::get('/user', function () {
    return "Anda User Aplikasi";
})->middleware('auth')->name('user');

Route::get('/admin', function () {
    return "Selamat Datang, Administrator";
})->middleware('auth')->name('admin');

require __DIR__ . '/auth.php';
