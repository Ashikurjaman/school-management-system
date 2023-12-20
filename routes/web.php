<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectClassController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get("/",[AuthController::class,"login"]);
Route::post("/login",[AuthController::class,"AuthLogin"]);
Route::get("/logout",[AuthController::class,"AuthLogout"]);
Route::get("/forget-password",[AuthController::class,"ForgetPassword"]);
Route::post("/forget-password",[AuthController::class,"PostForgetPassword"]);
Route::get("/reset/{token}",[AuthController::class,"Reset"]);
Route::post("/reset/{token}",[AuthController::class,"PostReset"]);


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('admin/list', [AdminController::class,'list']);
Route::get('admin/list/add', [AdminController::class,'Add']);
Route::post('admin/list/add', [AdminController::class,'insert']);
Route::get('admin/list/edit/{id}', [AdminController::class,'Edit']);
Route::post('admin/list/edit/{id}', [AdminController::class,'Update']);
Route::get('admin/list/delete/{id}', [AdminController::class,'Delete']);
Route::get('admin/list/void/{id}', [AdminController::class,'Void']);


// class route

Route::get('admin/class/list', [ClassController::class,'list']);
Route::get('class/list/add', [ClassController::class,'add']);
Route::post('class/list/add', [ClassController::class,'insert']);
Route::get('class/list/edit/{id}', [ClassController::class,'Edit']);
Route::post('class/list/edit/{id}', [ClassController::class,'Update']);
Route::get('class/list/delete/{id}', [ClassController::class,'Delete']);
Route::get('class/list/void/{id}', [ClassController::class,'Void']);


// subject Route

Route::get('admin/subject/list', [SubjectController::class,'list']);
Route::get('subject/list/add', [SubjectController::class,'add']);
Route::post('subject/list/add', [SubjectController::class,'insert']);
Route::get('subject/list/edit/{id}', [SubjectController::class,'Edit']);
Route::post('subject/list/edit/{id}', [SubjectController::class,'Update']);
Route::get('subject/list/delete/{id}', [SubjectController::class,'Delete']);
Route::get('subject/list/void/{id}', [SubjectController::class,'Void']);




// assign_subject
Route::get('admin/assign_subject/list', [SubjectClassController::class,'list']);
Route::get('assign_subject/list/add', [SubjectClassController::class,'add']);
Route::post('assign_subject/list/add', [SubjectClassController::class,'insert']);
Route::get('assign_subject/list/edit/{id}', [SubjectClassController::class,'Edit']);
Route::post('assign_subject/list/edit/{id}', [SubjectClassController::class,'Update']);
Route::get('assign_subject/list/delete/{id}', [SubjectClassController::class,'Delete']);
Route::get('assign_subject/list/void/{id}', [SubjectClassController::class,'Void']);





Route::group(["middleware" => 'admin'],function(){
    Route::get("admin/dashboard",[DashboardController::class,"dashboard"]);
});
Route::group(["middleware" => 'student'],function(){
    Route::get("student/dashboard",[DashboardController::class,"dashboard"]);
});
Route::group(["middleware" => 'teacher'],function(){
    Route::get("teacher/dashboard",[DashboardController::class,"dashboard"]);
});
Route::group(["middleware" => 'parent'],function(){
    Route::get("parent/dashboard",[DashboardController::class,"dashboard"]);
});
