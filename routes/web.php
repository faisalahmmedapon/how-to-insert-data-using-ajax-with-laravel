<?php

use App\Http\Controllers\PostController;
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

Route::get('/',[PostController::class,'index'])->name('home');
Route::get('/message',[PostController::class,'data'])->name('data');
Route::get('/create',[PostController::class,'create'])->name('create');
Route::post('/store',[PostController::class,'store'])->name('store');
Route::get('/message/edit/{id}',[PostController::class,'edit'])->name('edit');
Route::post('/update/{id}',[PostController::class,'update'])->name('update');
Route::get('/message/delete/{id}',[PostController::class,'delete'])->name('delete');
