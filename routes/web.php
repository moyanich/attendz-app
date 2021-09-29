<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\{
    AdminController,
    UserController,
};
 

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


Route::group(['prefix' => 'admin' , 'middleware' => ['auth']], function() {
    Route::get('dashboard', [AdminController::class. 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class. 'iprofile'])->name('admin.profile');
    Route::get('settings', [AdminController::class. 'iprofile'])->name('admin.settings');
});


Route::group(['prefix' => 'user' , 'middleware' => ['auth']], function() {
    Route::get('dashboard', [UserController::class. 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class. 'iprofile'])->name('user.profile');
    Route::get('settings', [UserController::class. 'iprofile'])->name('user.settings');
});



Route::prefix('admin')->group(function () {
    


});


