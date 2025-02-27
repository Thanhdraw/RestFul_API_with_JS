@include('layouts.custommer.header');
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Liên Hệ</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/contact.js']);
</head>

<body class="top-0 font-sans bg-gray-100">
    <div class="flex flex-col min-h-screen">
        <!-- Header -->


        <!-- Mobile menu -->
        <div class="hidden bg-blue-500 md:hidden" id="mobile-menu">
            <div class="container px-4 py-2 mx-auto">
                <nav class="flex flex-col space-y-2 text-white">
                    <a href="#" class="px-4 py-2 rounded hover:bg-blue-600">Trang chủ</a>
                    <a href="#" class="px-4 py-2 rounded hover:bg-blue-600">Dịch vụ</a>
                    <a href="#" class="px-4 py-2 rounded hover:bg-blue-600">Về chúng tôi</a>
                    <a href="#" class="px-4 py-2 bg-blue-700 rounded">Liên hệ</a>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <main class="container flex-grow px-4 py-8 mx-auto">
            <section class="mb-10">
                <h1 class="mb-6 text-3xl font-bold text-gray-800 md:text-4xl">Liên Hệ Với Chúng Tôi</h1>
                <p class="max-w-2xl text-gray-600">Chúng tôi luôn sẵn sàng giải đáp mọi thắc mắc của bạn. Vui lòng điền
                    thông tin vào biểu mẫu dưới đây hoặc liên hệ với chúng tôi qua thông tin được cung cấp.</p>
            </section>

            <div class="grid gap-8 mb-12 md:grid-cols-2">
                <!-- Contact Form -->
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-6 text-2xl font-semibold text-gray-800">Gửi Tin Nhắn</h2>
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block mb-2 font-medium text-gray-700">Họ và tên</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 font-medium text-gray-700">Số điện thoại</label>
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block mb-2 font-medium text-gray-700">Chủ đề</label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="general">Thông tin chung</option>
                                <option value="support">Hỗ trợ kỹ thuật</option>
                                <option value="sales">Tư vấn dịch vụ</option>
                                <option value="feedback">Góp ý phản hồi</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block mb-2 font-medium text-gray-700">Nội dung tin nhắn</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required></textarea>
                        </div>
                        <button type="submit" id="submitBtn" onclick="sendContact()"
                            class="w-full px-6 py-2 font-medium text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 md:w-auto">Gửi
                            tin nhắn</button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div>
                    <div class="p-6 mb-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-2xl font-semibold text-gray-800">Thông Tin Liên Hệ</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Địa chỉ</h3>
                                    <p class="text-gray-600">123 Đường Nguyễn Huệ, Quận 1, TP. Hồ Chí Minh</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Điện thoại</h3>
                                    <p class="text-gray-600">+84 28 1234 5678</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Email</h3>
                                    <p class="text-gray-600">info@congtyabc.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-800">Giờ làm việc</h3>
                                    <p class="text-gray-600">Thứ Hai - Thứ Sáu: 8:00 - 17:30</p>
                                    <p class="text-gray-600">Thứ Bảy: 8:00 - 12:00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-2xl font-semibold text-gray-800">Kết Nối Với Chúng Tôi</h2>
                        <div class="flex space-x-4">
                            <a href="#" class="p-3 text-white bg-blue-600 rounded-full hover:bg-blue-700">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="p-3 text-white bg-blue-400 rounded-full hover:bg-blue-500">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.054 10.054 0 01-3.127 1.184 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z" />
                                </svg>
                            </a>
                            <a href="#" class="p-3 text-white bg-red-600 rounded-full hover:bg-red-700">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z" />
                                </svg>
                            </a>
                            <a href="#" class="p-3 text-white bg-pink-600 rounded-full hover:bg-pink-700">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                                </svg>
                            </a>
                            <a href="#" class="p-3 text-white bg-blue-700 rounded-full hover:bg-blue-800">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Bản Đồ</h2>
                <div class="flex items-center justify-center h-64 bg-gray-300 rounded-lg">
                    <p class="text-gray-600">Bản đồ hiển thị tại đây</p>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="text-white bg-gray-800">
            <div class="container px-4 py-8 mx-auto">
                <div class="grid gap-8 md:grid-cols-4">
                    <div>
                        <h3 class="mb-4 text-xl font-bold">Công Ty ABC</h3>
                        <p class="text-gray-400">Cung cấp dịch vụ chất lượng cao, đáp ứng mọi nhu cầu của khách hàng.
                        </p>
                    </div>
                    <div>
                        <h3 class="mb-4 text-lg font-semibold">Liên kết nhanh</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Trang chủ</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Dịch vụ</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Về chúng tôi</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="mb-4 text-lg font-semibold">Dịch vụ</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white">Tư vấn thiết kế</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Phát triển phần mềm</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Marketing số</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white">Hỗ trợ kỹ thuật</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="mb-4 text-lg font-semibold">Đăng ký nhận tin</h3>
                        <p class="mb-4 text-gray-400">Nhận thông tin mới nhất từ chúng tôi</p>
                        <form class="flex">
                            <input type="email" placeholder="Email của bạn"
                                class="w-full px-4 py-2 rounded-l-lg focus:outline-none">
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700">Đăng ký</button>
                        </form>
                    </div>
                </div>
                <div class="pt-8 mt-8 text-center text-gray-400 border-t border-gray-700">
                    <p>&copy; 2025 Công Ty ABC. Tất cả quyền được bảo lưu.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Toggle mobile menu
        document.querySelector('button').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>