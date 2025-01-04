@extends('layouts.custommer.header')

@section('cart')

@if(!empty($products))



    <body class="bg-gray-100">

        <div class="container px-4 py-6 mx-auto mt-8">
            <div class="mb-4">
                <a href="{{ url()->previous() }}"
                    class="inline-flex items-center px-4 py-2 space-x-2 text-sm font-medium text-gray-600 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Quay lại</span>
                </a>
            </div>
            <div class="overflow-hidden rounded-lg shadow-md bg-gray-50">
                <div></div>
                <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                    <!-- Product Images - Simplified -->

                    <div class="space-y-5">
                        <div class="overflow-hidden bg-gray-200 rounded-lg aspect-square hover:ring-1 hover:ring-blue-400">
                            <img src="{{$products->image}}" alt="Product Image" class="object-cover w-full h-full" />
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            @for($i = 1; $i <= 4; $i++)
                                <div
                                    class="overflow-hidden bg-gray-200 rounded-lg cursor-pointer aspect-square hover:ring-1 hover:ring-blue-400">
                                    <img src="{{$products->image}}" alt="View {{$i}}" class="object-cover w-full h-full" />
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Product Info - Simplified -->
                    <div class="my-40 space-y-4 md:pl-4">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">{{$products->name}}</h1>
                            <div class="flex items-center mt-1 text-sm">
                                <span class="text-yellow-500">★★★★★</span>
                                <span class="ml-1 text-gray-500">4.9 | Đã bán 1.2k</span>
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <span
                                class="text-3xl font-bold text-gray-800">{{number_format($products->price) . " " . '₫'}}</span>
                            <div class="flex items-center mt-1">
                                <span class="text-sm text-gray-500 line-through">29.990.000₫</span>
                                <span class="ml-2 px-2 py-0.5 text-xs text-red-500 bg-red-50 rounded">-7%</span>
                            </div>
                        </div>

                        <!-- Color & Storage Selection -->
                        <div class="space-y-3">
                            <!-- <div>
                                                                                                                                                                        <label class="text-sm font-medium text-gray-700">Màu sắc</label>
                                                                                                                                                                        <div class="grid grid-cols-4 gap-2 mt-1">
                                                                                                                                                                            @foreach(['purple' => 'Tím', 'yellow' => 'Vàng', 'black' => 'Đen', 'white' => 'Trắng'] as $color => $name)
                                                                                                                                                                                <button
                                                                                                                                                                                    class="p-2 border rounded hover:border-blue-400 focus:ring-1 focus:ring-blue-400">
                                                                                                                                                                                    <div class="w-6 h-6 mx-auto rounded-full bg-{{$color}}-500"></div>
                                                                                                                                                                                    <span class="mt-1 text-xs text-gray-600">{{$name}}</span>
                                                                                                                                                                                </button>
                                                                                                                                                                            @endforeach
                                                                                                                                                                        </div>
                                                                                                                                                                    </div> -->

                            <div>
                                <label class="text-sm font-medium text-gray-700">Dung lượng</label>
                                <div class="grid grid-cols-2 gap-2 mt-1">
                                    @foreach([['size' => '128GB', 'price' => '27.990.000₫'], ['size' => '256GB', 'price' => '30.990.000₫']] as $storage)
                                        <button
                                            class="p-2 text-sm border rounded hover:border-blue-400 focus:ring-1 focus:ring-blue-400">
                                            <div class="font-medium text-gray-800">{{$storage['size']}}</div>
                                            <div class="text-xs text-gray-500">{{$storage['price']}}</div>
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <button class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                                Mua ngay
                            </button>
                            <button
                                class="px-4 py-2 text-sm font-medium text-blue-500 bg-white border border-blue-500 rounded hover:bg-blue-50">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Description - Simplified -->
                <div class="border-t">
                    <div class="p-6">
                        <div class="mb-4 text-sm font-medium text-gray-800">{{$products->slug}}</div>
                        <p class="text-sm text-gray-600">
                            {{$products->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
@else
    <div>
        <p>Khong tim thay san pham</p>
    </div>
@endif


@include('layouts.custommer.footer')
@endsection