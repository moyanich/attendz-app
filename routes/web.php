<?php

use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentsController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\HR\HrEmployeesController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/**
 * Admin Routes
 * 
 */
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {

    Route::resource('/users', UserController::class);
    Route::resource('/departments', DepartmentsController::class)->except(['edit']); 
    Route::resource('/roles', RoleController::class);
    Route::resource('/employees', EmployeesController::class)->except(['edit']);
    Route::put('/employees/{employee}/contact', [EmployeesController::class, 'updatecontact'])->name('employees.updatecontact');

    Route::resource('/files', FilesController::class)->except(['index', 'create']);

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

    
});


/**
 * HR Routes
 */
Route::prefix('hr')->middleware(['auth', 'can:hr-access'])->name('hr.')->group(function () {
    Route::resource('/employees', HrEmployeesController::class)->except([
        'destroy'
    ]); 

   /* 
        Route::resource('/roles', RoleController::class)
        ->missing(
            function (Request $request) {
                return Redirect::route('RoleController');
            }
        );
  */

    
});


// auth.isSecurity 'auth.isSuperUser'