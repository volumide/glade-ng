<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/profile");
});

Route::get('/profile', function () {
    return view("dasboard");
});

Route::get("/logout", [UserController::class, 'logout']);
Route::get('/company/login/form', [CompanyController::class, 'login'])->middleware("employeeAccess", "restrictMultipleLogin");
Route::post('/company/login', [UserController::class, "companyLogin"])->middleware("employeeAccess");
Route::post('/company/register', [CompanyController::class, "registerCompany"])->middleware("employeeAccess");
Route::get('/register/company', [CompanyController::class, "register"])->middleware("employeeAccess");
Route::get('/login/company', [CompanyController::class, "login"])->middleware("employeeAccess", "restrictMultipleLogin");
Route::get('/company/profile/{id}', [CompanyController::class, "getCompany"])->middleware("employeeAccess");
Route::get('/company/all', [CompanyController::class, "getAllCompanys"])->middleware("employeeAccess", "companyAccess");
Route::get('/company/edit/{id}', [CompanyController::class, "viewCompanyUpdate"])->middleware("employeeAccess", "companyAccess");
Route::post('/company/update/{id}', [CompanyController::class, "updateCompany"])->middleware("employeeAccess");


Route::get('/admin/register/form', [UserController::class, 'register'])->middleware('isAllowed');
Route::get('/admin/delete/{id}', [UserController::class, 'deleteAdmin']);
Route::post('/admin/register', [UserController::class, 'adminRegister'])->middleware("employeeAccess");
Route::get('/admin/login/form', [UserController::class, 'login'])->middleware("employeeAccess", "restrictMultipleLogin");
Route::post('/admin/login', [UserController::class, "AdminLogin"])->middleware("employeeAccess");
Route::get('/admin/profile/{id}', [UserController::class, "adminProfile"])->middleware("employeeAccess");
Route::get('/admin/all', [UserController::class, "allAdmin"])->middleware("viewAdmin");

Route::get('/employee/register/form', [EmployeeController::class, 'registerForm'])->middleware("employeeAccess");
Route::post('/employee/register', [EmployeeController::class, 'registerEmployee'])->middleware("employeeAccess");
Route::get('/employee/login/form', [EmployeeController::class, "login"])->middleware("employeeAccess", "restrictMultipleLogin");
Route::post('/employee/login', [UserController::class, "employeeLogin"]);
Route::get('/employee/profile/{id}', [EmployeeController::class, "getEmployee"])->middleware("employeeAccess");
Route::get('/employee/all', [EmployeeController::class, "getAllEmployees"])->middleware("employeeAccess");
Route::get('/employee/update/{id}', [EmployeeController::class, "viewEmployeeUpdate"])->middleware("employeeAccess");
Route::post('/employee/edit/{id}', [EmployeeController::class, "updateEmployee"])->middleware("employeeAccess");