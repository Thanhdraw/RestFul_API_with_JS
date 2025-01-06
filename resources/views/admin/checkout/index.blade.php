@extends('layouts.admin')

@section('header')
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    Admin Dashboard - Quản lý danh mục
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Hoá đơn </h3>
                    <form class="flex gap-2" action="{{ route('admin.category.search') }}" method="post">
                        @csrf
                        <input type="text" class="border-gray-300 rounded-md" name="search"
                            placeholder="Tìm kiếm danh mục">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Tìm kiếm
                        </button>
                    </form>
                </div>

                <div class="flex gap-4 mb-6">
                    <a href="#" class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                        Thêm danh mục
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="w-4 p-4">
                                    <input type="checkbox" class="border-gray-300 rounded">
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">STT</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Mã hoá đơn
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Giá tiền
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
                            @if (!empty($transitions) && $transitions->count() > 0)

                                @foreach ($transitions as $category)
                                    <tr>
                                        <td class="p-4">
                                            <input type="checkbox" class="border-gray-300 rounded">
                                        </td>
                                        <td class="px-6 py-4">#</td>
                                        <td class="px-6 py-3 min-w-[150px]">{{ $category->id }}</td>
                                        <td class="px-6 py-4">{{number_format($category->total, 0, ',', '.')}}</td>
                                        <td class="px-6 py-4">{{ $category->created_at }}</td>
                                        <td class="px-6 py-4">
                                            <div class="flex gap-2">
                                                <a href="{{route('transation.details', $category->id)}}"
                                                    class="p-2 text-white bg-green-500 rounded-md hover:bg-green-600">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <form action="#" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="p-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                                        @php
                                                            $name = request('search');
                                                        @endphp
                                                        <tr>
                                                            <td colspan="6" class="p-4 text-center">Không tìm thấy danh mục với tên "
                                                                {{ $name }} ".
                                                            </td>
                                                        </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 bg-white-50">
                    <nav class="flex justify-end p-4">

                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection