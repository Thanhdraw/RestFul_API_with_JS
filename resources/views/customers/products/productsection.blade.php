<?php
use App\Models\Product;
$featured = Product::where('is_featured', 1)->get();
?>



<section class="container px-6 py-12 mx-auto">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold">Sản phẩm nổi bật</h2>
        <div class="flex space-x-2">
            <button class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>
            <button class="p-2 bg-gray-100 rounded-full hover:bg-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Product Card 1 -->
        @if(!empty($featured))
            @foreach($featured as $product)

                <div
                    class="flex flex-col h-full overflow-hidden transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                    <div class="relative">
                        <a href="{{route('shop.detail', $product->id)}}">
                            <img src="{{ $product->image }}" alt="iPhone 15 Pro Max" class="object-cover w-64 h-64" />
                        </a>
                        <span
                            class="absolute px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-full top-4 right-4">-15%</span>
                    </div>
                    <div class="flex flex-col flex-grow p-6">
                        <div class="flex-grow">
                            <h3 class="mb-2 text-xl font-bold">
                                {{ $product->name }}
                            </h3>
                            <p class="mb-4 text-gray-600">
                                256GB - Titan Tự Nhiên
                            </p>
                            <div class="flex items-baseline mb-4">
                                <span
                                    class="text-2xl font-bold text-blue-600">{{number_format($product->price, 2, ',', '.')}}đ</span>
                                <span class="ml-2 text-sm text-gray-500 line-through">39.990.000₫</span>
                            </div>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span class="ml-1 text-gray-500">4.9 (256)</span>
                                </div>
                            </div>
                        </div>
                        <button
                            class="w-full py-3 mt-auto font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            <p>Khong tim thay san pham</p>
        @endif
        <!-- Product Card 2 -->

        <!-- Các card khác tương tự... -->
    </div>
</section>