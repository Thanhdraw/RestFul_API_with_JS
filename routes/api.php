<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route để lấy thông tin user đang đăng nhập
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route group yêu cầu xác thực Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductController::class, 'index']); // Lấy danh sách sản phẩm
    Route::get('/products/{id}', [ProductController::class, 'show']); // Lấy chi tiết sản phẩm
    Route::post('/products', [ProductController::class, 'store']); // Thêm sản phẩm
    Route::put('/products/{id}', [ProductController::class, 'update']); // Cập nhật sản phẩm
    Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Xóa sản phẩm
});

