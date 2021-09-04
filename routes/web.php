<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\MenuController;

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

Auth::routes();

// disable register page
Route::get('/register', function() {
    return redirect('/login');
});
Route::post('/register', function() {
    return redirect('/login');
});

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resources([
    'permissions' => PermissionController::class,
    'roles' => RoleController::class,
    'users' => UserController::class,
    'businesses' => BusinessController::class,
    'menus' => MenuController::class
]);

Route::get('users/active/{id}', [ UserController::class, 'active'])->name('users.active');
