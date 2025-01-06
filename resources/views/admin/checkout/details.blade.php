@extends('layouts.admin')

@section('content')

<body class="py-10 bg-gray-100">
    <div class="max-w-5xl p-8 mx-auto bg-white rounded-lg shadow-xl">
        <h1 class="mb-6 text-3xl font-extrabold text-gray-800">Chi tiết hóa đơn</h1>

        <!-- Thông tin hóa đơn -->
        <div class="mb-8">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-lg text-gray-700"><strong>Mã hóa đơn:</strong> <span
                            class="text-blue-600">#{{ $info_user['order_id'] }}</span>
                    </p>
                    <p class="text-lg text-gray-700"><strong>Khách hàng:</strong> <span
                            class="text-gray-900">{{ $info_user['name'] }}</span></p>
                    <p class="text-lg text-gray-700"><strong>Email:</strong> <span
                            class="text-gray-900">{{ $info_user['email'] }}</span></p>
                </div>
                <div>
                    <p class="text-lg text-gray-700"><strong>Phone:</strong> <span
                            class="text-gray-900">{{ $info_user['phone'] ?? 'N/A' }}</span></p>
                    <p class="text-lg text-gray-700"><strong>Địa chỉ:</strong> <span
                            class="text-gray-900">{{ $info_user['address'] ?? 'N/A' }}</span></p>
                    <p class="text-lg text-gray-700"><strong>Ngày tạo:</strong> <span
                            class="text-gray-900">2025-01-06</span></p>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="overflow-hidden border rounded-lg shadow-sm">
            <table class="w-full text-left table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-sm font-bold text-gray-600 border-b">Tên sản phẩm</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-600 border-b">Số lượng</th>
                        <th class="px-6 py-4 text-sm font-bold text-right text-gray-600 border-b">Giá</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-600 border-b">Thuộc tính</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if(!empty($details))
                        @foreach ($details as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-900">{{ $item->product_name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-gray-900">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-right text-gray-900">{{ number_format($item->price, 2) }} VNĐ</td>
                                <td class="px-6 py-4 text-gray-900">N/A</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-600">Không có sản phẩm nào.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Tổng tiền -->
        <div class="mt-6 text-right">
            <p class="text-2xl font-bold text-gray-800">
                Tổng tiền: <span class="text-green-600">{{ number_format(25000000, 2) }} VNĐ</span>
            </p>
        </div>

        <!-- Nút thao tác -->
        <div class="flex justify-end mt-8 space-x-4">
            <a href="{{route('invoice.pdf', $info_user['order_id'])}}"
                class="px-6 py-2 text-white bg-blue-500 rounded-md shadow hover:bg-blue-600 focus:outline-none">
                <i class="fas fa-print"></i> In hóa đơn
            </a>
            <button onclick="window.history.back();"
                class="px-6 py-2 text-white bg-gray-500 rounded-md shadow hover:bg-gray-600 focus:outline-none">
                <i class="fas fa-arrow-left"></i> Quay lại
            </button>
        </div>
    </div>
</body>

@endsection