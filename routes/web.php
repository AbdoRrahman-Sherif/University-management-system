<?php

use App\Http\Controllers\AdmissionApplicationController;
use App\Http\Controllers\Auth\BaseAuthenticationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\UgStudentController;
use App\Http\Controllers\PgStudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseRegistrationController;


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


Route::get('/faculties',  [FacultyController::class, 'facultiesPage'])->name('faculties');

Route::get('/professors',  [ProfessorController::class, 'professorsPage'])->name('professors');


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

Route::middleware(['role:staff'])->get('/staff/dashboard',  [StaffController::class, 'dashboard'])->name('staff.dashboard');

Route::middleware(['role:ug_student'])->get('/ug_students/dashboard', [UgStudentController::class, 'dashboard'])->name('ug_students.dashboard');

Route::middleware(['role:pg_student'])->get('/pg_students/dashboard',[PgStudentController::class, 'dashboard'])->name('pg_students.dashboard');

Route::middleware(['role:professor'])->get('/professors/dashboard', [ProfessorController::class, 'dashboard'])->name('professors.dashboard');

Route::middleware(['role:admission_application'])->get('/admission/dashboard',  [AdmissionApplicationController::class, 'dashboard'])->name('admission.dashboard');




// Routes for Courses
Route::get('/courses', [CourseController::class, 'list'])->name('courses.list');
Route::middleware(['role:staff'])->get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::middleware(['role:staff'])->post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::middleware(['role:ug_student'])->post('/courses/register', [CourseController::class, 'register'])->name('courses.register');
Route::middleware(['role:staff'])->post('/courses/close', [CourseController::class, 'closeRegistration'])->name('courses.closeregistration');

