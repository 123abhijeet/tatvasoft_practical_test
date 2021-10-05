<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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


Route::get('/',[BlogController::class,'index'])->name('index');

Auth::routes();

Route::prefix('users')->middleware('auth')->group(function(){
    
Route::get('dashboard',[BlogController::class,'dashboard'])->name('dashboard');
Route::get('addblog',[BlogController::class,'addblog'])->name('addblog');
Route::post('blog',[BlogController::class,'storeblog'])->name('store_blog');
Route::get('updateblog/{id}',[BlogController::class,'updateblog'])->name('update_blog');
Route::post('storeupdateblog/{id}',[BlogController::class,'storeupdatedblog'])->name('store_updated_blog');
Route::get('deleteblog/{id}',[BlogController::class,'deleteblog'])->name('delete_blog');

});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
