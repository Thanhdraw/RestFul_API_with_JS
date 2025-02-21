@extends('layouts.admin')



@section('content')

    <body class="p-6 bg-gray-100">
        <div class="max-w-4xl p-6 mx-auto bg-white rounded-lg shadow-lg">
            <h1 class="mb-4 text-2xl font-bold text-gray-800">Danh sách sản phẩm</h1>
            <ul id="product-list" class="space-y-3"></ul>
            <div id="pagination" class="flex justify-center mt-4"></div>
        </div>
    </body>
@endsection