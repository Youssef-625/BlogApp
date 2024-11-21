<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/','home');
Route::view('/contact','contact');

Route::controller(JobController::class)->group(function (){
   Route::get('jobs','index');
   Route::get('jobs/create','create')->middleware('auth');
   Route::get('jobs/{job}','show');
   Route::post('jobs','store')->middleware('auth');
   Route::get('jobs/{job}/edit','edit')->middleware('auth')->can('edit-job','job');;
   Route::patch('jobs/{job}','update')->middleware('auth')->can('edit-job','job');;
   Route::delete('jobs/{job}','destroy')->middleware('auth')->can('edit-job','job');;
});

Route::get('/register',[RegisteredUserController::class,'create'])->middleware('guest');
Route::post('/register',[RegisteredUserController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'create'])->middleware('guest')->name('login');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');
Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');
