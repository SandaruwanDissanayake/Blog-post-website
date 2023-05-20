<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\psotController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class,'index'])->name('welcome');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//posts
Route::get('/posts/{postId}/show',[psotController::class,'show'])->name('posts.show');

Route::group(['middleware'=>'auth'],function(){

    Route::post('/posts/store',[psotController::class,'store'])->name('posts.store');
    Route::get('/posts/all',[HomeController::class,'allPost'])->name('posts.all');
    Route::get('/posts/{postId}/edit',[psotController::class,'edit'])->name('posts.edit');
    Route::post('/posts/{postId}/update',[psotController::class,'update'])->name('posts.update');
    Route::get('/posts/{postId}/delete',[psotController::class,'delete'])->name('posts.delete');
    

});



//Admin routs


Route::group(['middleware'=>['admin','auth']],function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->middleware('admin')->name('admin.dashboard');

});