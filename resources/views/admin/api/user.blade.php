@extends('layouts.admin')

@section('content')

    <body class="p-6 bg-gray-100">

        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-2xl font-bold text-gray-800">Danh sách Users</h1>
            <div id="userList" class="space-y-4">
                <!-- Danh sách users sẽ hiển thị ở đây -->
            </div>
        </div>

        <!-- Views details -->
        <div id="userModal"
            class="fixed inset-0 flex items-center justify-center hidden transition-opacity bg-black bg-opacity-50">
            <div class="relative p-6 transition-all transform scale-95 bg-white rounded-lg shadow-xl w-96">
                <!-- Nút đóng -->
                <button onclick="closeModal()" class="absolute text-gray-600 top-2 right-2 hover:text-red-500">
                    ✖
                </button>

                <h2 id="user_name" class="text-2xl font-bold text-gray-900"></h2>
                <h3 id="id_user" class="text-2xl font-bold text-gray-900"></h3>
                <img id="user_image" src="" alt="Hình ảnh sản phẩm"
                    class="object-cover w-auto h-56 mx-auto my-4 rounded-lg shadow-sm">
                <p id="user_price" class="text-lg font-semibold text-gray-700"></p>
                <p id="user_description" class="text-gray-600"></p>

                <button onclick="closeModal()"
                    class="px-6 py-2 mt-5 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                    Đóng
                </button>
            </div>
        </div>


        <!-- eidit chinh sua -->
        <!-- Edit User Modal -->
        <div id="editUserModal"
            class="fixed inset-0 flex items-center justify-center hidden transition-opacity bg-black bg-opacity-50">
            <div class="relative p-6 transition-all transform scale-95 bg-white rounded-lg shadow-xl w-96">
                <button onclick="closeEditModal()"
                    class="absolute text-gray-600 top-2 right-2 hover:text-red-500">✖</button>

                <h2 class="text-2xl font-bold text-gray-900">Chỉnh sửa người dùng</h2>

                <form id="editUserForm" class="mt-4">
                    <input type="hidden" id="edit_user_id">

                    <div class="mb-4">
                        <label class="block font-semibold">Tên:</label>
                        <input type="text" id="edit_user_name" class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Email:</label>
                        <input type="email" id="edit_user_email" class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Role ID:</label>
                        <input type="number" id="edit_user_role" class="w-full p-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold">Ảnh đại diện:</label>
                        <input type="file" id="edit_user_avatar" accept="image/*" class="w-full p-2 border rounded-lg"
                            onchange="previewImage(event)">
                        <img id="avatar_preview" src="" class="w-24 h-24 mt-2 border rounded-full" alt="Avatar Preview">
                    </div>

                    <button type="button" onclick="updateUser()"
                        class="px-6 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">Cập nhật</button>
                </form>
            </div>
        </div>


    </body>

@endsection