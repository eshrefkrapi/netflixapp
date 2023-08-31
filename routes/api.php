<?php

use App\Models\Movie;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('categories', [CategoryController::class, 'index']);

Route::post('category/store', [CategoryController::class, 'store']);

Route::post('category/show/{id}', [CategoryController::class, 'show']);

Route::delete('category/delete/{id}', [CategoryController::class, 'destroy']);

Route::post('category/update/{id}', [CategoryController::class, 'update']);




Route::post('serie/store', [SerieController::class, 'storeS']);

Route::get('series', [SerieController::class, 'index2']);

Route::post('serie/show/{id}', [SerieController::class, 'showS']);

Route::delete('serie/delete/{id}', [SerieController::class, 'destroy2']);

Route::post('serie/update/{id}', [SerieController::class, 'update2']);



Route::post('movie/store', [MovieController::class, 'storeM']);

Route::get('movies', [MovieController::class, 'index3']);

Route::post('movie/show/{id}', [MovieController::class, 'showM']);

Route::delete('movie/delete/{id}', [MovieController::class, 'destroy3']);

Route::post('movie/update/{id}', [MovieController::class, 'update3']);


Route::post('role/store', [RoleController::class, 'storeR']);

Route::get('roles', [RoleController::class, 'index4']);

Route::post('role/show/{id}', [RoleController::class, 'showR']);

Route::delete('role/delete/{id}', [RoleController::class, 'destroy4']);

Route::post('role/update/{id}', [RoleController::class, 'update4']);