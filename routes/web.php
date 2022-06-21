<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm')->middleware('guest');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('showRegisterForm')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('student', [UserController::class, 'student']);
Route::get('teacher', [UserController::class, 'teacher']);
Route::get('students', [UserController::class, 'students'])->name('students');
Route::get('teachers', [UserController::class, 'teachers'])->name('teachers');
Route::get('classes', [UserController::class, 'classes'])->name('classes');
Route::get('stuprofile/{id}', [UserController::class, 'returnstudent'])->name('stuprofile');
Route::get('class/{id}', [UserController::class, 'returnclass'])->name('class');
Route::get('classT/{id}', [UserController::class, 'returnclassT'])->name('classT');
Route::get('teacherprof/{id}', [UserController::class, 'returnteacher'])->name('teacherprof');
Route::post('/upladfile', [FileController::class, 'uploadfile']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout'); //**for testing */
//Route::inertia('classT')->name('classTt');
Route::resource('post', PostsController::class);
Route::redirect('/', 'login');
