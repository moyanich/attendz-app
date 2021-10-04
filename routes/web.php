<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\{
    //AdminController,
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

// Admin Routes
// Prefix 'admin' allows us to namespace the routes
// Name prefixes all the route name with 'admin.' 
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
});
