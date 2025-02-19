<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/products', [ProductController::class, 'index']); // Lấy danh sách sản phẩm
Route::get('/products/{id}', [ProductController::class, 'show']); // Lấy chi tiết sản phẩm
Route::post('/products', [ProductController::class, 'store']); // Thêm sản phẩm
Route::put('/products/{id}', [ProductController::class, 'update']); // Cập nhật sản phẩm
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Xóa sản phẩm
