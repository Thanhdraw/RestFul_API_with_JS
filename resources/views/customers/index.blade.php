<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phone Store - Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <!-- Header -->
    @include('layouts.custommer.header')

    <!-- Hero Section -->
    @include('layouts.custommer.herosection')

    <!-- san pham noi bat -->
    <!-- Featured Products Section -->

    @yield('content')

    @yield('contact')


    @include('customers.products.productsection')

    <!-- Tại sao chọn Phone Store -->
    <!-- Content Section -->

    <!-- sản pham noi bac -->

    @include('customers.products.Feaproducts')

    <!-- Features Section -->


    <!-- content  -->
    @include('customers.contact.why');
    <!-- Newsletter Section -->


    <!-- review section -->





    <!-- Footer -->
    @include('layouts.custommer.footer')
</body>

<!-- Rest of your HTML code -->

</html>