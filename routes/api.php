<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ListsController;
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

Route::get('/wishlists', [ListsController::class, 'index']);
Route::get('/wishlists/{wishList}', [ListsController::class, 'show']);
Route::post('/wishlists', [ListsController::class, 'store']);
Route::put('/wishlists/{wishList}', [ListsController::class, 'update']);
Route::delete('/wishlists/{wishList}', [ListsController::class, 'destroy']);

Route::get('/libraries', [LibraryController::class, 'index']);
Route::get('/libraries/{library}', [LibraryController::class, 'show']);
Route::post('/libraries', [LibraryController::class, 'store']);
Route::put('/libraries/{library}', [LibraryController::class, 'update']);
Route::delete('/libraries/{library}', [LibraryController::class, 'destroy']);
