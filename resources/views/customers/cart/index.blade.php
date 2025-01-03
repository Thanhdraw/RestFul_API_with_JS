<!-- Shopping Cart Container -->
@extends('layouts.custommer.header')

@section('cart')
<div class="min-h-screen py-8 bg-gray-100">
    <div class="container px-4 mx-auto">
        <h1 class="mb-6 text-2xl font-semibold text-gray-800">Giỏ hàng của bạn</h1>

        <div class="flex flex-col gap-8 lg:flex-row">
            <!-- Cart Items Section -->
            <div class="lg:w-2/3">
                <div class="p-6 mb-4 bg-white rounded-lg shadow-md">
                    <!-- Cart Item 1 -->
                    <div class="flex flex-col items-center justify-between py-4 border-b md:flex-row">
                        <div class="flex flex-col items-center gap-4 md:flex-row">
                            <img src="/api/placeholder/120/120" alt="iPhone 13 Pro"
                                class="object-cover w-24 h-24 rounded" />
                            <div>
                                <h2 class="text-lg font-bold text-gray-800">iPhone 13 Pro</h2>
                                <p class="text-gray-600">Màu: Xanh Sierra</p>
                                <p class="text-gray-600">Bộ nhớ: 256GB</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center gap-4 mt-4 md:flex-row md:mt-0">
                            <div class="flex items-center border rounded-lg">
                                <button class="px-4 py-2 hover:bg-gray-100">-</button>
                                <span class="px-4 py-2 border-x">1</span>
                                <button class="px-4 py-2 hover:bg-gray-100">+</button>
                            </div>
                            <p class="text-lg font-semibold text-gray-800">29.990.000₫</p>
                            <button class="text-red-500 hover:text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="flex flex-col items-center justify-between py-4 border-b md:flex-row">
                        <div class="flex flex-col items-center gap-4 md:flex-row">
                            <img src="/api/placeholder/120/120" alt="AirPods Pro"
                                class="object-cover w-24 h-24 rounded" />
                            <div>
                                <h2 class="text-lg font-bold text-gray-800">AirPods Pro</h2>
                                <p class="text-gray-600">Màu: Trắng</p>
                                <p class="text-gray-600">Bảo hành: 12 tháng</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center gap-4 mt-4 md:flex-row md:mt-0">
                            <div class="flex items-center border rounded-lg">
                                <button class="px-4 py-2 hover:bg-gray-100">-</button>
                                <span class="px-4 py-2 border-x">1</span>
                                <button class="px-4 py-2 hover:bg-gray-100">+</button>
                            </div>
                            <p class="text-lg font-semibold text-gray-800">5.990.000₫</p>
                            <button class="text-red-500 hover:text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="lg:w-1/3">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-lg font-semibold">Tổng đơn hàng</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tạm tính</span>
                            <span class="text-gray-800">35.980.000₫</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Phí vận chuyển</span>
                            <span class="text-gray-800">30.000₫</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Giảm giá</span>
                            <span class="text-green-500">-500.000₫</span>
                        </div>
                        <div class="pt-3 border-t">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold">Tổng cộng</span>
                                <span class="text-lg font-semibold text-blue-600">35.510.000₫</span>
                            </div>
                        </div>
                    </div>

                    <!-- Coupon Input -->
                    <div class="mt-6">
                        <div class="flex gap-2">
                            <input type="text" placeholder="Mã giảm giá"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                            <button
                                class="px-4 py-2 text-white transition-colors bg-gray-800 rounded-lg hover:bg-gray-700">
                                Áp dụng
                            </button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button
                        class="w-full py-3 mt-6 text-center text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                        Tiến hành thanh toán
                    </button>

                    <!-- Continue Shopping Link -->
                    <a href="#" class="block mt-4 text-center text-blue-600 hover:text-blue-700">
                        ← Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
@endsection