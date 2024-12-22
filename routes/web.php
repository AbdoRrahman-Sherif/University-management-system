<?php

use App\Http\Controllers\Auth\BaseAuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StaffAuthenticationController;
use App\Http\Controllers\Auth\UGStudentAuthenticationController;
use App\Http\Controllers\Auth\PGStudentAuthenticationController;
use App\Http\Controllers\Auth\ProfessorAuthenticationController;

Route::get('/', function () {
    return view('index');
});


Route::get('/login', [BaseAuthenticationController::class, 'loginForm'])->name('login');
Route::post('/login', [BaseAuthenticationController::class, 'login']);
Route::post('/logout', [BaseAuthenticationController::class, 'logout'])->name('logout');



Route::middleware(['role:staff'])->get('/staff/dashboard', function () {
    return "Welcome to the Staff Dashboard";
})->name('staff.dashboard');

Route::middleware(['role:ug_student'])->get('/ug_students/dashboard', function () {
    return "Welcome to the Undergraduate Students Dashboard";
})->name('ug_students.dashboard');

Route::middleware(['role:pg_student'])->get('/pg_students/dashboard', function () {
    return "Welcome to the Postgraduate Students Dashboard";
})->name('pg_students.dashboard');

Route::middleware(['role:professor'])->get('/professors/dashboard', function () {
    return "Welcome to the Professors Dashboard";
})->name('professors.dashboard');
