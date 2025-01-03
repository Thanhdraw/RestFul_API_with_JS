@extends('layouts.admin')

@section('header')
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    Admin Dashboard - {{ Auth::user()->name }}
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Danh sách sản phẩm</h3>
                    <form class="flex gap-2" action="{{ route('admin.product.search') }}" method="post">
                        @csrf
                        <input type="text" class="border-gray-300 rounded-md" name="search"
                            placeholder="Tìm kiếm sản phẩm">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Tìm kiếm
                        </button>
                    </form>
                </div>

                <div class="flex gap-4 mb-6">
                    @foreach ($categories as $category) 
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            Danh mục {{ $category->name }} <span
                                class="text-gray-500">({{ $category->products()->count() }})</span>

                        </a>
                    @endforeach


                </div>

                <div class="flex gap-2 mb-6">
                    <select class="border-gray-300 rounded-md">
                        <option>Chọn</option>
                        <option>Xóa sản phẩm</option>
                        <option>Cập nhật sản phẩm</option>
                    </select>
                    <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Áp dụng
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="w-4 p-4">
                                    <input type="checkbox" class="border-gray-300 rounded">
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tên sản phẩm
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Slug</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Giá</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Danh mục
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Ngày tạo
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if (session('success'))
                                <div
                                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div
                                    class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (!empty($products) && $products->count() > 0)
                                <?php    $i = ($products->currentPage() - 1) * 10 + 1; ?>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="p-4"><input type="checkbox" class="border-gray-300 rounded"></td>
                                        <td class="px-6 py-4">{{ $i++ }}</td>
                                        <td class="px-6 py-3 min-w-[100px]">{{ $product->name }}</td>
                                        <td class="px-6 py-4">{{ $product->slug }}</td>
                                        <td class="px-6 py-4">{{ number_format($product->price, 0, ',', '.') }} đ</td>
                                        <td class="px-6 py-4">{{ $product->category->name ?? 'Không có danh mục' }}</td>
                                        <td class="px-6 py-4">{{ $product->created_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                                                    class="p-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                                                    Sửa
                                                </a>
                                                <form action="{{ route('admin.product.destroy', ['id' => $product->id]) }}"
                                                    method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="p-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                                        Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8" class="p-4 text-center">Không tìm thấy sản phẩm.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 bg-white-50">
                    <nav class="flex justify-end p-4">
                        {{ $products->links() }}
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection