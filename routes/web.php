<?php

use App\Http\Controllers\ListsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/deactivate-account', [UserController::class, 'deactivateAccount'])->name('deactivate-account');

// Display the "My Lists" page
Route::get('/lists', [ListsController::class, 'index'])->name('lists.index');

// Display the form to create a new list
Route::get('/lists/create', [ListsController::class, 'create'])->name('lists.create');

// Handle the form submission to create a new list
Route::post('/lists', [ListsController::class, 'store'])->name('lists.store');

// Display a list's details and allow the user to add libraries to it
Route::get('/lists/{list}', [ListsController::class, 'show'])->name('lists.show');
Route::put('/lists/{list}', [ListsController::class, 'update'])->name('lists.update');

