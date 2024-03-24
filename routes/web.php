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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', '\App\Http\Controllers\UserController');
    Route::resource('/Types_products', '\App\Http\Controllers\Type_produitController');
    Route::resource('/Stockage', '\App\Http\Controllers\StorageController');
});
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/orders_mangement','\App\Http\Controllers\CommandeController@orders')->name("order_management");
    Route::resource('/Types_products_management', '\App\Http\Controllers\Type_produitController');
    Route::resource('/Stockage_management', '\App\Http\Controllers\StorageController');
    Route::post('/value_select/{id}','\App\Http\Controllers\CommandeController@select_value');
});


Route::middleware(['auth'])->group(function () {                    
    // Route::get('home', function () {
    //     return view('admin.index');
    // });
  
    Route::get("/home",'\App\Http\Controllers\Orders_confirmController@index')->name("home");
    Route::get('/download/{id}',[GeneralController::class,'download']);   
});

Route::middleware(['auth', 'role:printer1'])->group(function () {
    Route::get("/History_dtfprinter", '\App\Http\Controllers\PrinterController@history');
    Route::post("/printed1/{idP}", '\App\Http\Controllers\PrinterController@IsPrinted1')->name("printer1");
});

Route::middleware(['auth', 'role:printer2'])->group(function () {
    Route::get("/History_Hoodiprinter", '\App\Http\Controllers\PrinterController@history');
    Route::post("/printed2/{idP}", '\App\Http\Controllers\PrinterController@IsPrinted2')->name("printer2");

});

Route::middleware(['auth','role:dropshiper'])->group(function () {
    Route::get('/Drop', function () {
        return view('dropshiper.index');
    });
    Route::resource('/design', '\App\Http\Controllers\DesignController');
    Route::resource('/produit', '\App\Http\Controllers\ProduitController');
    Route::post('produit/{id}', '\App\Http\Controllers\ProduitController@storewithCmd');
    Route::resource('/orders','\App\Http\Controllers\CommandeController');
   
});
Route::middleware(['auth','role:confirmateur'])->group(function () {
    
    Route::post("/confirmation_order/{id}",'\App\Http\Controllers\Orders_confirmController@confirmation_order');
    Route::post("/confirmationfinal_order/{id}",'\App\Http\Controllers\Orders_confirmController@confirmation2_order');
    Route::post("/commentaire/{id}",'\App\Http\Controllers\Orders_confirmController@comment');
    Route::post("/commentaire2/{id}",'\App\Http\Controllers\Orders_confirmController@comment2');
    Route::get("/Confirmateur_History",'\App\Http\Controllers\Orders_confirmController@history');
    Route::post('/uploadaudio1/{id}', '\App\Http\Controllers\Orders_confirmController@confirm_audio1_upload');
    Route::post('/uploadaudio2/{id}', '\App\Http\Controllers\Orders_confirmController@confirm_audio2_upload');
    Route::get("/orderDone",'\App\Http\Controllers\Orders_confirmController@orderDone')->name("confirm_orderDone");
    
//    Route::get("/orders_confirm",'\App\Http\Controllers\Orders_confirmController@index');
    // Route::resource('/design', '\App\Http\Controllers\DesignController');
    // Route::resource('/commande', '\App\Http\Controllers\CommandeController');
    // Route::resource('/produit', '\App\Http\Controllers\ProduitController');
    // Route::post('produit/{id}', '\App\Http\Controllers\ProduitController@storewithCmd');
   
});
Route::post('/saveAudio', '\App\Http\Controllers\Orders_confirmController@confirm_audio1');
