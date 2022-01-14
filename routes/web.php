<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\AdminController;

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
Route::get('/gerant/profile', [GerantController::class, 'profile']);

Route::prefix('client')->name('client.')->group(function() {

    Route::middleware(['guest:client','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.client.login')->name('login');
        Route::view('/register','dashboard.client.register')->name('register');
        Route::post('/create',[ClientController::class,'create'])->name('create');
        Route::post('/check',[ClientController::class,'check'])->name('check');
    });

    Route::middleware(['auth:client','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.client.home')->name('home');
        Route::post('logout',[ClientController::class,'logout'])->name('logout');
    });
});

Route::prefix('gerant')->name('gerant.')->group(function(){

    Route::middleware(['guest:client','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.gerant.login')->name('login');
        Route::view('/register','dashboard.gerant.register')->name('register');
        Route::post('/create',[GerantController::class,'create'])->name('create');
        Route::post('/check',[GerantController::class,'check'])->name('check');
    });

    Route::middleware(['auth:gerant','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.gerant.home')->name('home');
        Route::post('logout',[GerantController::class,'logout'])->name('logout');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('logout',[AdminController::class,'logout'])->name('logout');
    });

});
