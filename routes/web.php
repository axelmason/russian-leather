<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserVerifyController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    });
});
Route::name('admin.')->prefix('admin')->controller(AdminController::class)->group(function() {
    Route::get('/login', 'loginPage')->name('loginPage');
    Route::post('/login', 'login')->name('login');

    Route::middleware(['admin'])->group(function() {
        Route::get('/', 'dashboard')->name('dashboard');
    });



    Route::get('/roles', [RoleController::class, 'get']);
    Route::get('/roles/{roleId}', [RoleController::class, 'getOne']);
    Route::get('/permissions', [PermissionController::class, 'get']);
    Route::patch('/roles/{roleId}/permissions', [RoleController::class, 'changePermissions']);

    Route::get('/reviews', [ReviewController::class, 'get']);
});

Route::middleware('auth')->group(function() {
    Route::post('sendReview', [ReviewController::class, 'create'])->name('sendReview');
    Route::post('setRead', [ReviewController::class, 'read']);
});

Route::get('/account/verify/{token}', [UserVerifyController::class, 'verifyEmail'])->name('user.verify');
