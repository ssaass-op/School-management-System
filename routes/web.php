<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DepartmentTeacherController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrate-secret', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Database migrated successfully!';
});


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/service', function () {
    return view('service');
})->name('service');
Route::get('/faq', function () {
    return view('faq');
})->name('faq');



Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::get('/department-teacher', [DepartmentTeacherController::class, 'index'])->name('department_teacher.index');
Route::get('/department-teacher/create', [DepartmentTeacherController::class, 'create'])->name('department_teacher.create');
Route::post('/department-teacher', [DepartmentTeacherController::class, 'store'])->name('department_teacher.store');
Route::get('/department-teacher/{id}/edit', [DepartmentTeacherController::class, 'edit'])->name('department_teacher.edit');
Route::put('/department-teacher/{id}', [DepartmentTeacherController::class, 'update'])->name('department_teacher.update');
Route::delete('/department-teacher/{id}', [DepartmentTeacherController::class, 'destroy'])->name('department_teacher.destroy');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments',[DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments',[DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');



});
require __DIR__.'/auth.php';


