<?php

//use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\{
    UserController,
    RoleController,
    //AdminController,
};
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
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin', 'auth.isSuperAdmin'])->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
});


// auth.isSecurity