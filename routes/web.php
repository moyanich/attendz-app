<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/


Route::get('/dashboard', function () {
    if (session('status')) {
        return redirect()->route('admin.index')->with('status', session('status'));
    }

    return redirect()->route('admin.index');
});

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    'namespace' => 'User',
    'middleware' => ['auth']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/', 'HomeController@index')->name('home');
   
   
   /* // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Trips
    Route::delete('trips/destroy', 'TripsController@massDestroy')->name('trips.massDestroy');
    Route::resource('trips', 'TripsController'); */
});






/*
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

*/



