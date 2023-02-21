<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserVerifyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Permission;

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

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/catalog/{category?}', [CategoryController::class, 'category'])->name('catalog.category');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    });
});
Route::name('admin.')->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('loginPage');
    Route::post('/login', 'login')->name('login');

    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
    });

    Route::get('/roles', [RoleController::class, 'get']);
    Route::get('/roles/{roleId}', [RoleController::class, 'getOne']);
    Route::get('/permissions', [PermissionController::class, 'get']);
    Route::patch('/roles/{roleId}/permissions', [RoleController::class, 'changePermissions']);

    Route::get('/reviews', [ReviewController::class, 'get']);
    Route::patch('/reviews/read-toggler/{reviewId}', [ReviewController::class, 'toggleRead']);

    Route::post('/settings/save', [SettingsController::class, 'save']);
    Route::get('/settings', [SettingsController::class, 'get']);
});

Route::middleware('auth')->group(function () {
    Route::middleware('permissions:' . Permission::PERSONAL_WORK)->prefix('personal')->group(function () {
        Route::get('/', [PageController::class, 'personal'])->name('personal');
    });

    Route::post('sendReview', [ReviewController::class, 'create'])->name('sendReview')->middleware('permissions:' . Permission::REVIEWS);
});

Route::get('/account/verify/{token}', [UserVerifyController::class, 'verifyEmail'])->name('user.verify');
