<?php

use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\EducationTypesController;
//use App\Http\Controllers\HR\HrEmployeesController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


/**
 * Admin Routes
 * 
 */
//Route::prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function () {
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    Route::resource('/users', UserController::class)->middleware('auth.admin'); 
    Route::resource('/departments', DepartmentsController::class)->middleware('auth.admin')->except(['edit']); 
    Route::resource('/roles', RoleController::class)->middleware('auth.admin'); 

    // EMPLOYEE ROUTES
    Route::resource('/employees', EmployeesController::class)->except(['edit']);
    Route::put('/employees/{employee}/contact', [EmployeesController::class, 'updatecontact'])->name('employees.updatecontact');
    Route::put('/employees/{employee}/savenote', [EmployeesController::class, 'savenote'])->name('employees.savenote');

    // EDUCATION ROUTES
    Route::get('/employees/{employee}/education', [EmployeesController::class, 'education'])->name('employees.education'); 
    Route::post('/employees/{employee}/education', [EmployeesController::class, 'education_store'])->name('employees.education_store'); 
    
    
    // FILES ROUTE
    Route::resource('/files', FilesController::class)->except(['index', 'create']);
    
});

/*

// START: Employment Routes
        Route::get('/employees/{employee}/employment', [EmployeesController::class, 'create_employment'])->name('employees.employment');
        Route::post('/employees/{employee}/employment', [EmployeesController::class, 'store_employment'])->name('employees.employment_store'); 
        Route::get('/employees/{employment}/edit_employment/', [EmployeesController::class, 'edit_employment'])->name('employees.employment_edit'); 
        Route::post('/employees/{employee}/update_employment', [EmployeesController::class, 'update_employment'])->name('employees.employment_update'); 
        Route::delete('/employees/{employment}/destroy_employment/', [EmployeesController::class, 'destroy_employment'])->name('employees.employment_delete'); 


        */



/**
 * HR Routes
 */
  /* 
Route::prefix('hr')->middleware(['auth', 'can:hr-access'])->name('hr.')->group(function () {
 Route::resource('/employees', HrEmployeesController::class)->except([
        'destroy'
    ]);  


    
});*/


// auth.isSecurity 'auth.isSuperUser'

    //Route::post('/employees/{employee}/addfile', [EmployeesController::class, 'addfile'])->name('employees.addfile');
    //Route::put('/employees/{employee}/edit-file', [EmployeesController::class, 'editfile'])->name('employees.editfile');
    //Route::put('/employees/{employee}/update-file', [EmployeesController::class, 'updatefile'])->name('employees.updatefile');
    

    //Route::post('file-upload', [FilesController::class, 'fileUploadEployee'])->name('file.upload.employee');

    //Route::resource('/files', FilesController::class)->except(['create']);

   /* 
        Route::resource('/roles', RoleController::class)
        ->missing(
            function (Request $request) {
                return Redirect::route('RoleController');
            }
        );
  */