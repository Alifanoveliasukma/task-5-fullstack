<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\KategoriController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function(){
    Route::post('register','Api\V1\AuthController@register');
    Route::post('login','Api\V1\AuthController@login');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('logout','Api\V1\AuthController@logout');
    });
});

 route::get('/kategori', [KategoriController::class, 'index']);
 route::post('/kategori', [KategoriController::class, 'store']);
 route::get('/kategori/{id}', [KategoriController::class, 'show']);
 route::put('/kategori/{id}', [KategoriController::class, 'update']);
 route::get('/kategori/{id}/hapus', [KategoriController::class, 'destroy']);

 route::get('/artikel', [ArtikelController::class, 'index']);
 route::post('/artikel/create', [ArtikelController::class, 'store']);
 route::get('/artikel/{id}/detail', [ArtikelController::class, 'show']);
 route::put('/artikel/{id}', [ArtikelController::class, 'update']);
 route::get('/artikel/{id}/hapus', [ArtikelController::class, 'destroy']);

 Route::post('register', [RegisteredUserController::class, 'store']);