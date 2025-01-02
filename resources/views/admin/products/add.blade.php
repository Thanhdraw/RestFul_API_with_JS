@extends('layouts.admin')

@section('content')
<div class="max-w-2xl p-4 mx-auto mt-4 bg-gray-300 rounded">
    <h1 class="mb-4 text-2xl font-semibold">Tạo sản phẩm mới</h1>
    @if(session('success'))
        <div class="p-2 mb-4 text-white bg-green-500 rounded">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="p-2 mb-4 text-white bg-red-500 rounded">{{ session('error') }}</div>
    @endif
    <form action="{{ route('admin.product.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Tên sản phẩm</label>
            <input type="text" id="name" name="name"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" name="slug"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="imgage" class="block text-sm font-medium text-gray-700">imgage</label>
            <input type="text" id="imgage" name="imgage"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Giá</label>
            <input type="number" id="price" name="price"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">description</label>
            <input type="text" id="description" name="description"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
        </div>
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Danh mục</label>
            <select id="category_id" name="category_id"
                class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">Tạo
                sản phẩm</button>
        </div>
    </form>
</div>
@endsection