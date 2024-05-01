<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\Authcheck;

Route::get('/', function () {
    return view('register');
});

Route::post('/register',[StudentController::class,'userRegister'])->name('user.register');
Route::post('/userlogin',[StudentController::class,'userLogin'])->name('user.login');
Route::get('/login',[StudentController::class,'logIn'])->name('login');
Route::get('/logout',[StudentController::class,'logOut'])->name('user.logout');
Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware(Authcheck::class);
