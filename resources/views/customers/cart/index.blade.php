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
                    @if(!empty($listCart) && count($listCart) > 0)
                        @foreach ($listCart as $item)
                            <div class="flex flex-col items-center justify-between py-4 border-b md:flex-row">
                                <div class="flex flex-col items-center gap-4 md:flex-row">
                                    <img src="{{$item->attributes->image}}" alt="Product image"
                                        class="object-cover w-24 h-24 rounded-md" loading="lazy" />
                                    <div>
                                        <h2 class="text-lg font-bold text-gray-800">{{$item->name}}</h2>
                                        <p class="text-gray-600">Màu: Xanh Sierra</p>
                                        <p class="text-gray-600">{{$item->content}}</p>
                                    </div>
                                </div>
                                <div class="flex flex-col items-center gap-4 mt-4 md:flex-row md:mt-0">
                                    <div class="flex items-center border rounded-lg">

                                        <input type="number" id="quantity-{{$item->id}}" value="{{$item->quantity}}"
                                            class="w-20 px-4 py-2 text-center border-x" min="1">



                                    </div>
                                    <p class="text-lg font-semibold text-gray-800">{{number_format($item->price)}}₫</p>
                                    <button class="text-red-500 hover:text-red-600 remove-item" data-product-id="{{$item->id}}"
                                        onclick="confirm('Bạn có muốn xoá không ?')">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>


                            </div>
                            <!-- Update Cart Button -->


                        @endforeach
                        <!-- Update Cart and Clear All Buttons -->
                        <div class="flex justify-between mt-4 text-center">
                            <a href="{{route('cart.clear')}}" id="clear-all-btn"
                                onclick="confirm('Ban co muon xoa toan bo khong ?')"
                                class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                                Xoá toàn bộ
                            </a>
                            <button id="update-cart-btn"
                                class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Cập nhật giỏ hàng
                            </button>
                        </div>

                        <!-- Cart Item 1 -->

                    @else
                        <div class="flex flex-col items-center justify-center py-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/107/107831.png" alt="Empty cart image"
                                class="w-24 h-24" loading="lazy" />
                            <p class="text-lg font-semibold text-gray-800">Giỏ hàng của bạn</p>
                            <p class="text-gray-600">Không có sản phẩm nào </p>
                        </div>
                    @endif


                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="lg:w-1/3">
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-lg font-semibold">Tổng đơn hàng</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tạm tính</span>
                            <span class="text-gray-800">{{ number_format(Cart::getSubTotal(), 0, ',', '.') }}₫</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Phí vận chuyển</span>
                            <span
                                class="text-gray-800">{{number_format(Cart::getCondition('shipping'), 0, ',', '.')}}đ</span>
                        </div>

                        <div class="pt-3 border-t">
                            <div class="flex justify-between">
                                <span class="text-lg font-semibold">Tổng cộng</span>
                                <span
                                    class="text-lg font-semibold text-blue-600">{{ number_format(Cart::getSubTotal(), 0, ',', '.') }}₫</span>
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
                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full py-3 mt-6 text-center text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                            Tiến hành thanh toán
                        </button>
                    </form>



                    <!-- Continue Shopping Link -->
                    <a href="#" class="block mt-4 text-center text-blue-600 hover:text-blue-700">
                        ← Tiếp tục mua sắm
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault(); // Dòng này chặn form

    });

    function updateQuantity(productId, source) {
        const quantityInput = document.getElementById('quantity-' + productId);
        const quantity = quantityInput.value;

        // You can implement logic to handle the update or validation of the quantity
        console.log(`Product ID: ${productId}, Quantity: ${quantity}`);

        // Optional: send AJAX request to update the cart in real-time
        // You can collect all updated quantities later for the "Update Cart" button
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Remove item from cart
        const removeItemButtons = document.querySelectorAll('.remove-item');

        removeItemButtons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-product-id');
                if (confirm('Bạn có muốn xoá không ?')) {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    fetch(`http://127.0.0.1:8000/shop/remove-from-cart/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify({
                            product_id: productId
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('✅ Product removed from cart successfully!');
                                location.reload();
                            } else {
                                alert('❌ Failed to remove product from cart.');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            });
        });

        // Update cart quantities when the input changes
        const quantityInputs = document.querySelectorAll('input[type="number"]');

        quantityInputs.forEach(input => {
            input.addEventListener('change', function () {
                const productId = this.getAttribute('id').replace('quantity-', '');
                updateQuantity(productId, 'input');
            });
        });

        // Handle the "Update Cart" button click
        const updateCartButton = document.getElementById('update-cart-btn');
        updateCartButton.addEventListener('click', function () {
            const updatedQuantities = [];
            const inputs = document.querySelectorAll('input[type="number"]');

            inputs.forEach(input => {
                const productId = input.getAttribute('id').replace('quantity-', '');
                const quantity = input.value;

                updatedQuantities.push({ productId, quantity });
            });

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('http://127.0.0.1:8000/shop/update-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    updatedQuantities,
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('✅ Giỏ hàng đã được cập nhật!');
                        location.reload(); // Reload the page to reflect updated quantities
                    } else {
                        alert('❌ Cập nhật giỏ hàng thất bại.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>

@endsection