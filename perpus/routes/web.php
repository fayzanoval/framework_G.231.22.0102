<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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

//Route::get('/welcome', function() {
//    return view('welcome');
//});

Route::get('/', function() {
    return view('login.index');
});

Route::get('/perpus', function () {
    return view('perpus.main');
})->middleware('auth');

Route::get('/info', function() {
    return view('info',['progdi' => 'TI']);
});

use App\Http\Controllers\infoController;
Route::get('info/{kd}', [InfoController::class, 'infoMhs']);

//Route::get('/buku', function() {
//    return view('buku.add',[
//        'is_update' => 0,
//        'optkategori' => [
//            '' => '-Pilih salah satu -',
//            'novel' => 'Novel',
//            'komik' => 'Komik',
//            'kamus' => 'Kamus',
//            'program' => 'Pemrograman'
//        ]
//    ]);
//});

use App\Http\Controllers\BukuController;
Route::get('/buku',[BukuController::class,'index'])->middleware('auth');
Route::get('/buku/add',[BukuController::class,'add_new']);
Route::get('/buku/save',[BukuController::class,'save']);
Route::get('/buku/edit/{id}',[BukuController::class,'edit']);
Route::get('/buku/delete/{id}',[BukuController::class,'delete']);

use App\Http\Controllers\AnggotaController;
Route::get('/anggota',[AnggotaController::class,'index'])->middleware('auth');
Route::get('/anggota/add',[AnggotaController::class,'add_new']);
Route::get('/anggota/save',[AnggotaController::class,'save']);
Route::get('/anggota/edit/{id}',[AnggotaController::class,'edit']);
Route::get('/anggota/delete/{id}',[AnggotaController::class,'delete']);

use App\Http\Controllers\PinjamController;
Route::get('/pinjam',[PinjamController::class,'index'])->middleware('auth');
Route::get('/pinjam/add',[PinjamController::class,'add_new']);
Route::get('/pinjam/save',[PinjamController::class,'save']);
Route::get('/pinjam/edit/{id}',[PinjamController::class,'edit']);
Route::get('/pinjam/delete/{id}',[PinjamController::class,'delete']);

use App\Http\Controllers\PerpusController;
Route::get('/perpus',[PerpusController::class,'index'])->middleware('auth');

// use App\Http\Controllers\LoginController;
//Route::get('/login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);