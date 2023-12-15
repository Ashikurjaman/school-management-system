<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

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
// Route::post('admin/list/save', [AdminController::class,'SaveData']);


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
