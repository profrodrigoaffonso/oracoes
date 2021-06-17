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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/oracoes', 'App\Http\Controllers\OracoesController@oracoes')->name('oracoes.site');
Route::get('/{id}/ajax-oracoes', 'App\Http\Controllers\OracoesController@ajaxOracoes')->name('oracoes.ajax');

Route::prefix('admin/santos')->group(function(){
    Route::get('/', 'App\Http\Controllers\SantosController@index')->name('admin.santos.index');
    Route::get('/create', 'App\Http\Controllers\SantosController@create')->name('admin.santos.create');
    Route::post('/store', 'App\Http\Controllers\SantosController@store')->name('admin.santos.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\SantosController@edit')->name('admin.santos.edit');
    Route::put('/update', 'App\Http\Controllers\SantosController@update')->name('admin.santos.update');
});

Route::prefix('admin/oracoes')->group(function(){
    Route::get('/', 'App\Http\Controllers\OracoesController@index')->name('admin.oracoes.index');
    Route::get('/create', 'App\Http\Controllers\OracoesController@create')->name('admin.oracoes.create');
    Route::post('/store', 'App\Http\Controllers\OracoesController@store')->name('admin.oracoes.store');
    Route::get('/{id}/edit', 'App\Http\Controllers\OracoesController@edit')->name('admin.oracoes.edit');
    Route::put('/update', 'App\Http\Controllers\OracoesController@update')->name('admin.oracoes.update');
});
