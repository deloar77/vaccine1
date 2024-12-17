<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/',[RegistrationController::class,'showForm']);
Route::post('/register',[RegistrationController::class,'register'])->name('Register.User');
