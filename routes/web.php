<?php

use App\Http\Controllers\AdmissionApplicationController;
use App\Http\Controllers\Auth\BaseAuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StaffAuthenticationController;
use App\Http\Controllers\Auth\UGStudentAuthenticationController;
use App\Http\Controllers\Auth\PGStudentAuthenticationController;
use App\Http\Controllers\Auth\ProfessorAuthenticationController;

//views
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faculties', function () {
    return view('faculties');
})->name('faculties');

Route::get('/professors', function () {
    return view('professors');
})->name('professors');


//admission
    //register
Route::get('/admission',  [AdmissionApplicationController::class, 'submitAdmission'])->name('admission');
Route::post('/admission', [AdmissionApplicationController::class, 'store'])->name('admission.store');
    //login
Route::get('/admission/login', function () {return view('auth.addmissionLogin');})->name('addmission.login');
Route::post('/admission/login', [AdmissionApplicationController::class, 'loginAdmission'])->name('admission.login.submit');
Route::get('/logout', [AdmissionApplicationController::class, 'admissionLogout'])->name('admission.logout');

    //crud
Route::get('/admission/edit', [AdmissionApplicationController::class, 'edit'])->name('admissions.edit');
Route::post('/admission/update', [AdmissionApplicationController::class, 'update'])->name('admissions.update');
Route::post('/admission/delete', [AdmissionApplicationController::class, 'destroy'])->name('admissions.destroy');


//login


Route::get('/login', [BaseAuthenticationController::class, 'loginForm'])->name('login');
Route::post('/login', [BaseAuthenticationController::class, 'login']);
Route::post('/logout', [BaseAuthenticationController::class, 'logout'])->name('logout');


//dashboards

Route::middleware(['role:staff'])->get('/staff/dashboard', function () {
    return view('dashboards.StaffDashboard');
})->name('staff.dashboard');

Route::middleware(['role:ug_student'])->get('/ug_students/dashboard', function () {
    return view('dashboards.UgStudentDashboard');
})->name('ug_students.dashboard');

Route::middleware(['role:pg_student'])->get('/pg_students/dashboard', function () {
    return view('dashboards.PgStudentDashboard');
})->name('pg_students.dashboard');

Route::middleware(['role:professor'])->get('/professors/dashboard', function () {
    return view('dashboards.ProfessorDashboard');
})->name('professors.dashboard');

Route::middleware(['role:admission_application'])->get('/admission/dashboard',  [AdmissionApplicationController::class, 'dashboard'])->name('admission.dashboard');
