<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GerantController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Probably should be inside a middleware

Route::get('/gerant/profile', [GerantController::class, 'profile'])->name('profile.show');
Route::get('/gerant/profile/edit', [GerantController::class, 'editProfile'])->name('profile.edit');
Route::patch('/gerant/profile', [GerantController::class, 'updateProfile'])->name('profile.update');
