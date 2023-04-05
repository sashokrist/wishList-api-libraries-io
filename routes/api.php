<?php

use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishListsController;
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

Route::post('/api-register', [ UserController::class, 'register'])->name('api-register');
//Route::post('/api-login', [ UserController::class, 'login'])->name('api-login');

Route::get('/wishlists', [WishListsController::class, 'index']);
Route::get('/wishlists/{wishList}', [WishListsController::class, 'show']);
Route::post('/wishlists', [WishListsController::class, 'store']);
Route::put('/wishlists/{wishList}', [WishListsController::class, 'update']);
Route::delete('/wishlists/{wishList}', [WishListsController::class, 'destroy']);

Route::get('/libraries', [LibraryController::class, 'index']);
Route::get('/libraries/{library}', [LibraryController::class, 'show']);
Route::post('/libraries', [LibraryController::class, 'store']);
Route::put('/libraries/{library}', [LibraryController::class, 'update']);
Route::delete('/libraries/{library}', [LibraryController::class, 'destroy']);

Route::get('/packages', [PackageController::class, 'show']);
