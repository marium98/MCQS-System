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

//* MCQS SYSTEM ROUTES */
    Route::get('/insert',[App\Http\Controllers\QuestionController::class, 'insert'])->name('insert');
    Route::post('/create',[App\Http\Controllers\QuestionController::class, 'create'])->name('create');
    Route::resource('show','App\Http\Controllers\ExtraController');
    Route::get('getQuestion',[App\Http\Controllers\ExtraController::class, 'getQuestion'])->name('getQuestion');
            
    Route::resource('result','App\Http\Controllers\ResultController');
    Route::resource('test','App\Http\Controllers\TestController');
    // Route::view('add', 'add');
    Route::view('admin', 'dashboard_admin');
    Route::get('final',[App\Http\Controllers\ScoreController::class,'display'])->name('final');

    // Register Student controllers
    Route::get('registration', [App\Http\Controllers\AuthController::class,'registration']);
    Route::post('post-registration', [App\Http\Controllers\AuthController::class,'postRegistration']); 

// Register Admin Controllers
  Route::get('adminlogin', [App\Http\Controllers\AdminController::class , 'index'])->name('adminlogin');
  Route::post('adminlogin', [App\Http\Controllers\AdminController::class , 'adminLogin'])->name('adminlogin'); 

  Route::get('adminreg', [App\Http\Controllers\AdminController::class , 'adminReg']);
  Route::post('adminreg', [App\Http\Controllers\AdminController::class , 'adminRegistration']); 
  
  Route::get('dashboard', [App\Http\Controllers\AdminController::class , 'dashboard']); 
  Route::get('adminlogout', [App\Http\Controllers\AdminController::class , 'adminLogout']);

  Route::get('form',  [App\Http\Controllers\FormController::class , 'index']);
  Route::post('form', [App\Http\Controllers\FormController::class , 'store']);

  Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('/admin', 'adminlogin');
});

// Route::get('student',[App\Http\Controllers\StudentController::class,'treat'])->name('student');
// Route::get('/final/{id}',[App\Http\Controllers\ResultController::class,'show'])->name('final.show');
//Route::get('final',[App\Http\Controllers\ResultController::class,'show'])->name('final');
/* Route::get('test',[App\Http\Controllers\TestController::class,'index'])->name('test');
Route::post('result',[App\Http\Controllers\TestController::class,'store'])->name('result'); 
Route::resource('ajax','App\Http\Controllers\AjaxController');
Route::post('ajax/update', [App\Http\Controllers\AjaxController::class ,'update'])->name('ajax.update');
Route::get('ajax/destroy/{id}', [App\Http\Controllers\AjaxController::class , 'destroy']);*/



 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
