@extends('layouts.admin')

@section('header')
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    Admin Dashboard - {{ Auth::user()->name }}
</h2>
@endsection

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Danh sách thùng rác</h3>
                    <form class="flex gap-2" action="{{ route('admin.user.search') }}" method="post">
                        @csrf
                        <input type="text" class="border-gray-300 rounded-md" name="search" placeholder="Tìm kiếm">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Tìm kiếm
                        </button>
                    </form>
                </div>

                <div class="flex gap-4 mb-6">
                    <a href="#" class="text-blue-600 hover:text-blue-800">
                        Trạng thái 1 <span class="text-gray-500">(10)</span>
                    </a>
                    <a href="#" class="text-blue-600 hover:text-blue-800">
                        Trạng thái 2 <span class="text-gray-500">(5)</span>
                    </a>
                    <a href="#" class="text-blue-600 hover:text-blue-800">
                        Trạng thái 3 <span class="text-gray-500">(20)</span>
                    </a>
                </div>

                <div class="flex gap-2 mb-6">
                    <select class="border-gray-300 rounded-md">
                        <option>Chọn</option>
                        <option>Tác vụ 1</option>
                        <option>Tác vụ 2</option>
                    </select>
                    <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Áp dụng
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="w-4 p-4"><input type="checkbox" class="border-gray-300 rounded"></th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Họ tên</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Username
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Quyền</th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Ngày tạo
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-left text-gray-500 uppercase">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="p-4"><input type="checkbox" class="border-gray-300 rounded"></td>
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->username ?? 'No username' }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">Administrator</td>
                                    <td class="px-6 py-4">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.user.restore', $user->id) }}"
                                            class="px-3 py-1 text-white bg-green-500 rounded-md hover:bg-green-600">
                                            Khôi phục
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-4 text-center">Thùng rác trống</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection