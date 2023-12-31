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
    
    Route::resource('/Types_products', '\App\Http\Controllers\Type_produitController');
    Route::resource('/Stockage', '\App\Http\Controllers\StorageController');
   

});
Route::middleware(['auth'])->group(function () {
    // Route::get('home', function () {
    //     return view('admin.index');
    // });
    Route::get("/home",'\App\Http\Controllers\Orders_confirmController@index')->name("xx");
    Route::get('/download/{id}',[GeneralController::class,'download']);
});

Route::middleware(['auth','role:dropshiper'])->group(function () {
    Route::get('/Drop', function () {
        return view('dropshiper.index');
    });
    Route::resource('/design', '\App\Http\Controllers\DesignController');
    Route::resource('/commande', '\App\Http\Controllers\CommandeController');
    Route::resource('/produit', '\App\Http\Controllers\ProduitController');
    Route::post('produit/{id}', '\App\Http\Controllers\ProduitController@storewithCmd');
    Route::resource('/orders','\App\Http\Controllers\CommandeController');
   
});
Route::middleware(['auth','role:confirmateur'])->group(function () {
    
    Route::post("/confirmation_order/{id}",'\App\Http\Controllers\Orders_confirmController@confirmation_order');
    Route::post("/commentaire/{id}",'\App\Http\Controllers\Orders_confirmController@comment');
//    Route::get("/orders_confirm",'\App\Http\Controllers\Orders_confirmController@index');
    // Route::resource('/design', '\App\Http\Controllers\DesignController');
    // Route::resource('/commande', '\App\Http\Controllers\CommandeController');
    // Route::resource('/produit', '\App\Http\Controllers\ProduitController');
    // Route::post('produit/{id}', '\App\Http\Controllers\ProduitController@storewithCmd');
   
});
