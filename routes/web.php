<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {

    // thông tin users
    Route::prefix('admin')->group(function () {
        Route::get('/user/list', [AdminController::class, 'list'])->name('admin.user.list');
        Route::post('/user/search', [AdminController::class, 'search'])->name('admin.user.search');
        Route::get('/user/add', [AdminController::class, 'addUser'])->name('admin.users.add');
        Route::post('/user/add', [AdminController::class, 'storeUser'])->name('admin.users.store');
    });

    // thong tin san pham
    Route::prefix('admin')->group(function () {
        Route::get('/product/add', [AdminController::class, 'addProduct'])->name('admin.product.add');
        Route::get('/product/list', [AdminController::class, 'listProduct'])->name('admin.product.list');
        Route::post('/product/search', [AdminController::class, 'search'])->name('admin.product.search');
    });

    // thong tin danh muc
    Route::prefix('admin')->group(function () {
        Route::get('/category/add', [AdminController::class, 'addCategory'])->name('admin.category.add');
        Route::get('/category/list', [AdminController::class, 'listCategory'])->name('admin.category.list');
        Route::post('/category/search', [AdminController::class, 'search'])->name('admin.category.search');
    });


});


require __DIR__ . '/auth.php';
