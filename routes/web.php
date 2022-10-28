<?php

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriwebController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArtikelwebController;
use App\Kategori;
use App\User;

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



Route::get('/', 'HomeController@index');
// api
// route::get('/kategori', [KategoriController::class, 'index']);
//  route::post('/kategori', [KategoriController::class, 'store']);
//  route::get('/kategori/{id}', [KategoriController::class, 'show']);
//  route::put('/kategori/{id}', [KategoriController::class, 'update']);
//  route::get('/kategori/{id}/hapus', [KategoriController::class, 'destroy']);

//  route::get('/artikel', [ArtikelController::class, 'index']);
//  route::post('/artikel/create', [ArtikelController::class, 'store']);
//  route::get('/artikel/{id}/detail', [ArtikelController::class, 'show']);
//  route::put('/artikel/{id}', [ArtikelController::class, 'update']);
//  route::get('/artikel/{id}/hapus', [ArtikelController::class, 'destroy']);

route::get('web/kategori/', [KategoriwebController::class, 'index']);
route::get('web/kategori/tambah', [KategoriwebController::class, 'tambah']);
route::post('web/kategori/store', [KategoriwebController::class, 'store']);
route::get('/web/kategori/{id}', [KategoriwebController::class, 'edit']);
route::post('/web/kategori/{id}/edit', [KategoriwebController::class, 'update']);
route::get('/delete/kategori/{id}', [KategoriwebController::class, 'destroy']);

route::get('web/artikel', [ArtikelwebController::class, 'index']);
route::get('web/artikel/tambah', [ArtikelwebController::class, 'tambah']);
route::post('store', [ArtikelwebController::class, 'store']);
route::get('/web/artikel/detail/{id}', [ArtikelwebController::class, 'detail']);
route::get('/web/artikel/{id}', [ArtikelwebController::class, 'edit']);
route::post('/web/artikel/{id}/edit', [ArtikelwebController::class, 'update']);
route::get('/delete/artikel/{id}', [ArtikelwebController::class, 'destroy']);

 

Auth::routes();


 Route::post('register', [AuthController::class, 'register']);

Route::get('/home', 'ArtikelwebController@index');
