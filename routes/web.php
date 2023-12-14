<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;


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
    return view('auth.login2');
});
Route::middleware(['auth','role:admin'])->group(function () {
   
    Route::resource('/users', '\App\Http\Controllers\UserController');
    Route::get('/download/{id}',[GeneralController::class,'download']);
    Route::resource('/Types_products', '\App\Http\Controllers\Type_produitController');
    Route::resource('/Stockage', '\App\Http\Controllers\StorageController');
   

});
Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('admin.index');
    });
    Route::resource('/orders','\App\Http\Controllers\CommandeController');
   

});

Route::middleware(['auth','role:dropshiper'])->group(function () {
    Route::get('/Drop', function () {
        return view('dropshiper.index');
    });
    Route::resource('/design', '\App\Http\Controllers\DesignController');

   
});
