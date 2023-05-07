<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [CompanyController::class, 'index'])->name('home');
Route::resource('/companies', CompanyController::class);
Route::get('/employees-list', [EmployeeController::class, 'index'])->name('employees.list');
Route::resource('/employees', EmployeeController::class);

Route::get('/employees-details/{id}', [CompanyController::class, 'employeesDetails'])->name('employees.details');