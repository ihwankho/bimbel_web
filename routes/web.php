<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


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
// routes/web.php

// file: routes/web.php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ScheduleController;

// Rute untuk menampilkan formulir pembuatan post

// Rute untuk menyimpan post baru ke database
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'edit']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
Route::patch('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);




Route::get('/create', function () {
    return view('create');
})->name('create.blade');


use App\Http\Controllers\UploadController;

Route::get('/upload-jadwal', [UploadController::class, 'showForm'])->name('upload.jadwal.form');
Route::post('/upload-jadwal', [UploadController::class, 'uploadFile'])->name('upload.jadwal');
Route::delete('/delete-jadwal', [UploadController::class, 'deleteFile'])->name('delete.jadwal');

use App\Http\Controllers\CustomerController;

Route::get('/register', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/register1', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');


// Tambahkan rute untuk halaman upload.blade.php
Route::get('/upload', function () {
    return view('upload');
})->name('upload.blade');

// routes/web.php

use App\Http\Controllers\PaketController;

Route::resource('paket',PaketController::class);
Route::get('paket', [PaketController::class, 'create'])->name('paket.create');
Route::get('paket', [PaketController::class, 'index'])->name('paket.index');


// routes/web.php

use App\Http\Controllers\CustomerManagementController;

Route::get('client', [CustomerManagementController::class, 'index'])->name('client.index');
Route::get('client/{id}/edit', [CustomerManagementController::class, 'edit'])->name('client.edit');
Route::put('client/{id}', [CustomerManagementController::class, 'update'])->name('client.update');
Route::delete('client/{id}', [CustomerManagementController::class, 'destroy'])->name('client.destroy');
Route::get('/get-harga/{namaPaket}', [CustomerManagementController::class, 'getHarga'])->name('get-harga');
Route::get('customer', [CustomerManagementController::class, 'index'])->name('customer.index');

//

use App\Http\Controllers\TransaksiController;

Route::resource('transaksi', TransaksiController::class);









Route::post('/upload', [ScheduleController::class, 'store']);

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

