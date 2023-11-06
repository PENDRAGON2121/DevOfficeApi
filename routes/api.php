<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//usuarios
Route::apiResource('usuarios', App\Http\Controllers\UsuariosController::class);
Route::post('login', [App\Http\Controllers\UsuariosController::class, 'login']);

//office
Route::apiResource('office', App\Http\Controllers\OfficeController::class);
Route::get('office/search/{keyword}', [App\Http\Controllers\OfficeController::class, 'searchOffices']);
Route::get('office/reviews/{id}', [App\Http\Controllers\OfficeController::class, 'getReviews']);
Route::get('office/tags/{id}', [App\Http\Controllers\OfficeController::class, 'getTags']);

//reviews
Route::apiResource('reviews', App\Http\Controllers\ReviewsController::class);
