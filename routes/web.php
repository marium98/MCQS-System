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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//*****MCQS SYSTEM ROUTES */
Route::get('/insert',[App\Http\Controllers\QuestionController::class, 'insert'])->name('insert');
Route::post('/create',[App\Http\Controllers\QuestionController::class, 'create'])->name('create');
Route::resource('show','App\Http\Controllers\ExtraController');
Route::get('getQuestion',[App\Http\Controllers\ExtraController::class, 'getQuestion'])->name('getQuestion');
//Route::get('show',[App\Http\Controllers\ExtraController::class, 'index'])->name('show');
Route::resource('test','App\Http\Controllers\TestController');
//Route::view('final', 'final');
Route::resource('final','App\Http\Controllers\ResultController');
Route::get('/final/{id}',[App\Http\Controllers\ResultController::class,'show'])->name('final.show');
//Route::get('final',[App\Http\Controllers\ResultController::class,'show'])->name('final');
/* Route::get('test',[App\Http\Controllers\TestController::class,'index'])->name('test');
Route::post('result',[App\Http\Controllers\TestController::class,'store'])->name('result'); */




