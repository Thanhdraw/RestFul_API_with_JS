<?php
use App\Models\Product;
$isNew = Product::where('is_new', 1)->get();
    
?>


<section class="py-16 bg-gray-50">


    <section class="py-16 bg-white">
        <div class="container px-6 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold">Sản phẩm mới</h2>
                <p class="max-w-2xl mx-auto text-gray-600">
                    Khám phá những sản phẩm mới nhất và hot nhất tại Phone
                    Store!
                </p>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <!-- Product 1 -->
                @if(!empty($isNew))
                    @foreach ($isNew as $product)

                        <div class="p-6 transition-shadow bg-white shadow-lg rounded-xl hover:shadow-xl">
                            <a href="{{route('shop.detail', $product->id)}}">
                                <img class="object-cover w-64 h-64 mb-4 rounded-lg" src="{{$product->image}}"
                                    alt="Sản phẩm 1" />
                            </a>
                            <h3 class="mb-2 text-xl font-semibold">{{$product->name}}</h3>
                            <p class="mb-4 text-gray-600">
                                {{$product->description}}
                            </p>
                            <div class="flex items-center justify-between">
                                <span
                                    class="text-lg font-bold text-blue-600">{{number_format($product->price, 2, '.', '.')}}đ</span>
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Xem chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</section>