<?php

use App\Http\Controllers\Admin\CheckoutController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\ShopController\CustomerController;
use App\Http\Controllers\ShopController\CartController as ShopControllerCartController;
use App\Http\Controllers\ShopController\CheckoutController as ShopControllerCheckoutController;
use Illuminate\Auth\Events\Authenticated;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ShopController\CartController;
use App\Http\Controllers\ShopController\ProductController as ShopControllerProductController;
use App\Http\Controllers\ShopController\Profile\ProfileController as ProfileProfileController;

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


// Route::get('/dashboard', [DashboardController::class, 'show'])
//     ->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])
        ->name('dashboard');

    Route::get('/transation', [DashboardController::class, 'transation'])
        ->name('transation');

    Route::get('/transation/details/{id}', [CheckoutController::class, 'checkoutDetails'])->name('transation.details');
    Route::get('/order/{orderId}/invoice', [InvoiceController::class, 'generateInvoice'])->name('invoice.generate');
    Route::get('/invoice/{invoice}/pdf', [CheckoutController::class, 'generatePDF'])->name('invoice.pdf');

});




Route::middleware(['auth', 'checkRole:customer'])->group(function () {
    Route::get('/shop', [CustomerController::class, 'index'])
        ->name('shop.index');

    Route::get('/shop/products', action: [ShopControllerProductController::class, 'show'])->name('shop.products');
    Route::get('/shop/products/{id}', action: [ShopControllerProductController::class, 'detailProduct'])->name('shop.detail');

    Route::get('/shop/products/category/{id}', action: [ShopControllerProductController::class, 'show'])->name('shop.category');

    // Cart - Action
    Route::post('/shop/add-to-cart/{id}', [ShopControllerCartController::class, 'addCart'])->name('shop.addcart');

    Route::post('/shop/remove-from-cart/{id}', [ShopControllerCartController::class, 'removeCart'])->name('shop.removecart');

    Route::post('/shop/update-cart', [ShopControllerCartController::class, 'updateCart'])->name('shop.updatecart');

    Route::get('/shop/clear-cart', [ShopControllerCartController::class, 'clearCart'])->name('cart.clear');

    Route::post('/shop/checkout', [ShopControllerCheckoutController::class, 'checkout'])->name('cart.checkout');

    // profile
    Route::get('/shop/profile', [ProfileProfileController::class, 'index'])->name('profile');
    Route::post('/shop/profile', [ProfileProfileController::class, 'update'])->name('profile.update');
    Route::delete('/shop/profile/delete', [ProfileProfileController::class, 'destroy'])->name('profile.delete')->middleware('auth');

    // search
    Route::get('/shop/search/{search?}', [ShopControllerProductController::class, 'search'])->name('shop.search');
    // cart controller
    Route::get('/shop/cart', [ShopControllerCartController::class, 'cart'])->name('shop.cart');
});



Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::middleware(['auth'])->group(function () {

    // thông tin users
    Route::prefix('admin')->group(function () {
        Route::get('/user/list', [AdminController::class, 'list'])->name('admin.user.list');
        Route::post('/user/search', [AdminController::class, 'search'])->name('admin.user.search');
        Route::get('/user/add', [AdminController::class, 'addUser'])->name('admin.users.add');
        Route::post('/user/add', [AdminController::class, 'storeUser'])->name('admin.users.store');
        Route::get('/user/edit/{id}', [AdminController::class, 'editUser'])->name('admin.user.edit');
        Route::post('/user/edit/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::get('/user/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');

        // trash user
        Route::get('/user/trash', [TrashController::class, 'trashUser'])->name('admin.user.trash');
        Route::get('/user/restore/{id}', [TrashController::class, 'restoreUser'])->name('admin.user.restore');



        // Products
        Route::get('/product/add', action: [ProductController::class, 'addProduct'])->name('admin.product.add');






    });



    // thong tin san pham
    Route::prefix('admin')->group(function () {
        Route::get('/product/add', action: [ProductController::class, 'addProduct'])->name('admin.product.add');
        Route::get('/product/list', [ProductController::class, 'listProduct'])->name('admin.product.list');
        Route::post('/product/search', [AdminController::class, 'search'])->name('admin.product.search');
        Route::post('/product/add', [ProductController::class, 'storeProduct'])->name('admin.product.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'editProduct'])->name('admin.product.edit');
        Route::put('/product/edit/{id}', [ProductController::class, 'updateProduct'])->name('admin.product.update');
        Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.product.destroy');
    });

    // thong tin danh muc
    Route::prefix('admin')->group(function () {
        Route::get('/category/add', [AdminController::class, 'addCategory'])->name('admin.category.add');
        Route::get('/category/list', [AdminController::class, 'listCategory'])->name('admin.category.list');
        Route::post('/category/search', [AdminController::class, 'search'])->name('admin.category.search');
    });


});


require __DIR__ . '/auth.php';
