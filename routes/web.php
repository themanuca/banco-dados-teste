<?php

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

Route::get('/categoria', 'App\Http\Controllers\HomeController@conscategoria');

Route::get('/', 'App\Http\Controllers\HomeController@categoria');


Auth::routes(['register'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('/produto', 'App\Http\Controllers\HomeController@produto')->name('produto');
    Route::POST('/produto/post', 'App\Http\Controllers\HomeController@cadastroproduto')->name('cadproduto');
   
});


Route::get('logout', function(){

    Auth::logout();
    return redirect('login');
 })->name('logout');


Route::get('/teste','App\Http\Controllers\HomeController@ontetomany');


Route::post('/teste/download', 'App\Http\Controllers\HomeController@conluidoDW');