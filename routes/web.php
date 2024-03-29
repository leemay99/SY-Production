<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
use App\Providers;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'search']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/delete',[App\Http\Controllers\ItemController::class, 'delete']);

    Route::post('/update/{items}',[App\Http\Controllers\ItemController::class, 'update']);

   //商品変更画面
    Route::get('/edit/{items}', [App\Http\Controllers\ItemController::class, 'edit']);
    
    

});