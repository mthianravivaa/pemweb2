<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriProdukController;

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

Route::get('/salam', function(){
    return view('salam',[
        "nama" => "Meuthia Nuraviva",
        "umur" => 19
    ]);
});
Route::get('/nilai', function () {
    return view('nilai');
});
Route::get('/tugasform',function(){
    return view('tugasform',[
        "nama"=>"Meuthia Nuraviva",
        "tanggal_pemeriksaan"=>"5 April 2023",
        "umur"=>19,
        "jenis_kelamin"=>"Perempuan"
    ]);
});
Route::get('/formulir', function () {
    return view('formulir');
});

Route::get('/form',[FormController::class,'index']);
Route::post('/hasil',[FormController::class,'hasil']);

// admin
Route::group(['middlewere' => ['auth', 'peran:admin-manager']], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index']);
        Route::get('/produk',[ProdukController::class,'index']);
        Route::get('/produk/create',[ProdukController::class, 'create']);
        Route::post('/produk/store',[ProdukController::class, 'store']);
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
        Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
        Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy']);
        Route::get('/logout',[DashboardController::class, 'logout']);
});
});

// froend
Route::prefix('frontend')->group(function(){
    Route::get('/dashboard',[FrontendController::class,'index']);
    Route::get('/about',[FrontendController::class,'about']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
