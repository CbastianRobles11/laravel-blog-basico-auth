<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginassController;
use App\Http\Controllers\PostsController;
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
//para pagina de inicio
Route::get('/',[PaginassController::class,'index'])->name('home');


//para el crud de post
Route::resource('blog',PostsController::class);

Auth::routes();



Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

