-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2025 lúc 06:00 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `attributes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(2, 'Laptop', 'laptop', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(3, 'Máy tính bảng', 'may-tinh-bang', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(4, 'Phụ kiện', 'phu-kien', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(5, 'Tivi', 'tivi', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(6, 'Máy ảnh', 'may-anh', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(7, 'Đồng hồ', 'dong-ho', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(8, 'Tai nghe', 'tai-nghe', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(9, 'Máy tính để bàn', 'may-tinh-de-ban', '2024-12-31 05:23:08', '2024-12-31 05:23:08'),
(10, 'Thiết bị chơi game', 'thiet-bi-choi-game', '2024-12-31 05:23:08', '2024-12-31 05:23:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `total_amount` decimal(15,2) NOT NULL,
  `status` enum('pending','paid','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `order_id`, `user_id`, `invoice_number`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 44, 3, 'INV-zZCvFuD0', 25000000.00, 'pending', '2025-01-05 21:50:11', '2025-01-05 21:50:11'),
(57, 44, 3, 'INV-mCGCMxAB', 25000000.00, 'pending', '2025-01-06 07:31:30', '2025-01-06 07:31:30'),
(58, 44, 3, 'INV-esmxG3qF', 25000000.00, 'pending', '2025-01-06 07:31:44', '2025-01-06 07:31:44'),
(59, 44, 3, 'INV-JOmZsqvo', 25000000.00, 'pending', '2025-01-06 07:31:53', '2025-01-06 07:31:53'),
(60, 44, 3, 'INV-IOCewnkm', 25000000.00, 'pending', '2025-01-06 07:32:16', '2025-01-06 07:32:16'),
(61, 44, 3, 'INV-wmQJGojA', 25000000.00, 'pending', '2025-01-06 07:32:37', '2025-01-06 07:32:37'),
(62, 44, 3, 'INV-G2r9PfNs', 25000000.00, 'pending', '2025-01-06 07:33:37', '2025-01-06 07:33:37'),
(63, 44, 3, 'INV-gi5MMq98', 25000000.00, 'pending', '2025-01-06 07:35:46', '2025-01-06 07:35:46'),
(64, 44, 3, 'INV-mon9ymQS', 25000000.00, 'pending', '2025-01-06 07:39:13', '2025-01-06 07:39:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2025_01_03_020304_create_roles_table', 2),
(11, '2025_01_03_020350_create_role_user_table', 3),
(12, '2025_01_03_032436_add_role_id_to_users_table', 4),
(13, '2014_10_12_000000_create_users_table', 5),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(15, '2019_08_19_000000_create_failed_jobs_table', 5),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(17, '2024_12_31_084730_update_table_users', 5),
(18, '2024_12_31_115243_create_categories_table', 5),
(19, '2024_12_31_115749_create_table_products', 5),
(20, '2025_01_02_090051_add_deleted_at_to_users_table', 5),
(21, '2025_01_02_131954_update_to_products_table', 5),
(22, '2025_01_03_041611_create_roles_table', 6),
(23, '2025_01_03_041813_add_role_id_to_users_table', 7),
(24, '2025_01_04_125139_create_orders_table', 8),
(25, '2025_01_04_125536_create_orders_item_table', 9),
(26, '2025_01_04_125754_create_carts_table', 9),
(27, '2025_01_05_132603_create_orders_table', 10),
(30, '2025_01_06_033710_add_phone_and_address_to_users_table', 11),
(31, '2025_01_06_044048_create_invoices_table', 12),
(32, '2025_01_06_140625_add_user_id_to_invoices_table', 13),
(33, '2025_01_07_031145_add_is_featured_and_is_new_to_products_table', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`, `updated_at`) VALUES
(44, 3, 25000000.00, 'Pending', '2025-01-05 21:32:35', '2025-01-05 21:32:35'),
(45, 14, 61500000.00, 'Pending', '2025-01-06 08:37:07', '2025-01-06 08:37:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `attributes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `product_name`, `price`, `quantity`, `attributes`, `created_at`, `updated_at`) VALUES
(2, 44, 'iPhone 15 Pro Max', 25000000.00, 1, NULL, '2025-01-05 21:32:35', '2025-01-05 21:32:35'),
(3, 45, 'iPhone 15 Pro Max', 25000000.00, 1, NULL, '2025-01-06 08:37:07', '2025-01-06 08:37:07'),
(4, 45, 'Samsung Galaxy S23 Ultra', 36500000.00, 1, NULL, '2025-01-06 08:37:07', '2025-01-06 08:37:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_new` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `description`, `image`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `is_featured`, `is_new`) VALUES
(1, 'iPhone 15 Pro Max', 'iphone-15-pro-max', 25000000.00, 'iPhone 15 Pro Max với thiết kế hiện đại, chip A17 Bionic, camera ấn tượng.', 'https://cdn2.cellphones.com.vn/x/media/catalog/product/i/p/iphone-15-pro-max_3.png', 1, '2024-12-31 05:23:08', '2025-01-03 05:43:32', NULL, 1, 0),
(2, 'Samsung Galaxy S23 Ultra', 'samsung-galaxy-s23-ultra', 36500000.00, 'Galaxy S23 Ultra với màn hình AMOLED, bút S Pen và camera 200MP.', 'https://samcenter.vn/images/thumbs/0003280_galaxy-s23-ultra-512gb_550.jpeg', 1, '2024-12-31 05:23:08', '2025-01-03 05:43:54', NULL, 1, 0),
(3, 'MacBook Pro 14-inch M2', 'macbook-pro-14-m2', 55000000.00, 'MacBook Pro M2 với màn hình Retina, hiệu năng vượt trội.', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/318/659/products/ezgif-com-gif-maker.jpg?v=1675834782190', 2, '2024-12-31 05:23:08', '2025-01-03 05:44:15', NULL, 0, 1),
(4, 'Dell XPS 13 Plus', 'dell-xps-13-plus', 45000000.00, 'Dell XPS 13 Plus với màn hình InfinityEdge và hiệu năng mạnh mẽ.', 'https://no1computer.vn/images/products/2023/10/21/large/dell-xps-13-plus-9320-i7-1260p-3-_1697884770.jpg', 2, '2024-12-31 05:23:08', '2025-01-03 05:44:47', NULL, 1, 0),
(5, 'iPad Pro 12.9-inch M2', 'ipad-pro-12-9-m2', 32000000.00, 'iPad Pro với chip M2, màn hình Liquid Retina và hỗ trợ Magic Keyboard.', 'https://product.hstatic.net/1000259254/product/ipad_pro_m2_11_inch_wi-fi_space_gray-1_7a2aa43f055b4fc4814b5cb66098c00e_grande.jpg', 3, '2024-12-31 05:23:08', '2025-01-03 05:45:21', NULL, 0, 1),
(6, 'Sony WH-1000XM5', 'Sony WH-1000XM5', 7500000.00, 'Tai nghe chống ồn tốt nhất từ Sony với chất lượng âm thanh vượt trội.', 'https://cdn.tgdd.vn/Products/Images/54/313692/tai-nghe-bluetooth-chup-tai-sony-wh1000xm5-trang-1-750x500.jpg', 8, '2024-12-31 05:23:08', '2025-01-03 05:45:40', NULL, 0, 0),
(7, 'Canon EOS R8', 'canon-eos-r8', 60000000.00, 'Máy ảnh không gương lật với cảm biến Full-Frame và công nghệ hiện đại.', 'https://cdn.vjshop.vn/may-anh/mirrorless/canon/canon-eos-r8/body/canon-eos-r8.jpg', 6, '2024-12-31 05:23:08', '2025-01-03 05:46:04', NULL, 0, 1),
(8, 'Samsung Neo QLED 8K', 'samsung-neo-qled-8k', 80000000.00, 'Tivi Neo QLED 8K với hình ảnh siêu sắc nét và âm thanh sống động.', 'https://cdn.mediamart.vn/images/product/neo-qled-tivi-8k-samsung-65qn900a-65-inch-smart-tv_bad5e4ef.jpg', 5, '2024-12-31 05:23:08', '2025-01-03 05:46:24', NULL, 0, 0),
(9, 'Apple Watch Series 9', 'apple-watch-series-9', 12000000.00, 'Đồng hồ thông minh với tính năng sức khỏe và chip S9 mới nhất.', 'https://happyphone.vn/wp-content/uploads/2024/07/Apple-Watch-Series-9-45mm-vien-nhom-day-cao-su.png', 7, '2024-12-31 05:23:08', '2025-01-03 05:46:45', NULL, 1, 0),
(10, 'PlayStation 5', 'playstation-5', 16000000.00, 'Thiết bị chơi game mạnh mẽ với đồ họa tuyệt đẹp và bộ điều khiển DualSense.', 'https://www.tncstore.vn/media/product/250-9016-may-choi-game-sony-playstation-5-standard-edition-nhap-khau-japan-2.jpg', 10, '2024-12-31 05:23:08', '2025-01-03 05:47:11', NULL, 0, 1),
(11, 'Sony Headphones Điện thoại 2', 'sony-headphones-điện-thoại-2', 74811090.57, 'Mô tả cho Sony Headphones Điện thoại 2 thuộc danh mục Điện thoại.', 'https://sony.scene7.com/is/image/sonyglobalsolutions/wh-ch720_Primary_image?$categorypdpnav$&fmt=png-alpha', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(12, 'Samsung TV Điện thoại 3', 'samsung-tv-điện-thoại-3', 44138507.11, 'Mô tả cho Samsung TV Điện thoại 3 thuộc danh mục Điện thoại.', 'https://dienmaythienphu.vn/wp-content/uploads/2023/07/smart-tivi-qled-4k-65-inch-samsung-qa65q80c-200323-080603.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(13, 'Sony Camera Điện thoại 4', 'sony-camera-điện-thoại-4', 63829519.43, 'Mô tả cho Sony Camera Điện thoại 4 thuộc danh mục Điện thoại.', 'https://cdn.tgdd.vn/Files/2022/05/15/1432649/77_1280x858-800-resize.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(14, 'PlayStation 5 Điện thoại 5', 'playstation-5-điện-thoại-5', 48769148.81, 'Mô tả cho PlayStation 5 Điện thoại 5 thuộc danh mục Điện thoại.', 'playstation-5-điện-thoại-5.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(15, 'Laptop HP  6', 'laptop-hp-điện-thoại-6', 62550586.32, 'Mô tả cho Laptop HP Điện thoại 6 thuộc danh mục Điện thoại.', 'https://cdn1615.cdn4s4.io.vn/media/products/may-tinh-xach-tay/hp/pavilion-15/laptop%20hp%20pavilion%2015.webp', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(16, 'Sony Camera Điện thoại 7', 'sony-camera-điện-thoại-7', 32044193.53, 'Mô tả cho Sony Camera Điện thoại 7 thuộc danh mục Điện thoại.', 'sony-camera-điện-thoại-7.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(17, 'Samsung Monitor Điện thoại 8', 'samsung-monitor-điện-thoại-8', 72512606.60, 'Mô tả cho Samsung Monitor Điện thoại 8 thuộc danh mục Điện thoại.', 'https://cdn.tgdd.vn/Files/2022/03/07/1418878/samsung-smart-monitor-m8-remote_1280x720-800-resize.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(18, 'Samsung Monitor Điện thoại 9', 'samsung-monitor-điện-thoại-9', 38189316.90, 'Mô tả cho Samsung Monitor Điện thoại 9 thuộc danh mục Điện thoại.', 'samsung-monitor-điện-thoại-9.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(19, 'Apple TV Điện thoại 10', 'apple-tv-điện-thoại-10', 22666496.68, 'Mô tả cho Apple TV Điện thoại 10 thuộc danh mục Điện thoại.', 'apple-tv-điện-thoại-10.jpg', 1, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(20, 'Sony Headphones Laptop 1', 'sony-headphones-laptop-1', 76403972.15, 'Mô tả cho Sony Headphones Laptop 1 thuộc danh mục Laptop.', 'sony-headphones-laptop-1.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(21, 'Bose Headphones Laptop 2', 'bose-headphones-laptop-2', 74586853.56, 'Mô tả cho Bose Headphones Laptop 2 thuộc danh mục Laptop.', 'bose-headphones-laptop-2.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(22, 'iPhone Laptop 3', 'iphone-laptop-3', 61820711.96, 'Mô tả cho iPhone Laptop 3 thuộc danh mục Laptop.', 'iphone-laptop-3.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(23, 'PlayStation 5 Laptop 4', 'playstation-5-laptop-4', 49407872.34, 'Mô tả cho PlayStation 5 Laptop 4 thuộc danh mục Laptop.', 'playstation-5-laptop-4.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(24, 'Sony Headphones Laptop 5', 'sony-headphones-laptop-5', 70685412.51, 'Mô tả cho Sony Headphones Laptop 5 thuộc danh mục Laptop.', 'sony-headphones-laptop-5.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(25, 'Samsung Monitor Laptop 6', 'samsung-monitor-laptop-6', 27460490.49, 'Mô tả cho Samsung Monitor Laptop 6 thuộc danh mục Laptop.', 'samsung-monitor-laptop-6.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(26, 'iPhone Laptop 7', 'iphone-laptop-7', 25821526.54, 'Mô tả cho iPhone Laptop 7 thuộc danh mục Laptop.', 'iphone-laptop-7.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(27, 'iPhone Laptop 8', 'iphone-laptop-8', 58571268.24, 'Mô tả cho iPhone Laptop 8 thuộc danh mục Laptop.', 'iphone-laptop-8.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(28, 'Canon Printer Laptop 9', 'canon-printer-laptop-9', 16964230.84, 'Mô tả cho Canon Printer Laptop 9 thuộc danh mục Laptop.', 'canon-printer-laptop-9.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(29, 'Dell Monitor Laptop 10', 'dell-monitor-laptop-10', 24748857.80, 'Mô tả cho Dell Monitor Laptop 10 thuộc danh mục Laptop.', 'dell-monitor-laptop-10.jpg', 2, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(30, 'Apple Watch Máy tính bảng 1', 'apple-watch-máy-tính-bảng-1', 55608678.85, 'Mô tả cho Apple Watch Máy tính bảng 1 thuộc danh mục Máy tính bảng.', 'apple-watch-máy-tính-bảng-1.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(31, 'Canon Printer Máy tính bảng 2', 'canon-printer-máy-tính-bảng-2', 60724302.98, 'Mô tả cho Canon Printer Máy tính bảng 2 thuộc danh mục Máy tính bảng.', 'canon-printer-máy-tính-bảng-2.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(32, 'LG TV Máy tính bảng 3', 'lg-tv-máy-tính-bảng-3', 43186453.28, 'Mô tả cho LG TV Máy tính bảng 3 thuộc danh mục Máy tính bảng.', 'lg-tv-máy-tính-bảng-3.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(33, 'MacBook Pro Máy tính bảng 4', 'macbook-pro-máy-tính-bảng-4', 75868321.35, 'Mô tả cho MacBook Pro Máy tính bảng 4 thuộc danh mục Máy tính bảng.', 'macbook-pro-máy-tính-bảng-4.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(34, 'HP Printer Máy tính bảng 5', 'hp-printer-máy-tính-bảng-5', 39463358.32, 'Mô tả cho HP Printer Máy tính bảng 5 thuộc danh mục Máy tính bảng.', 'hp-printer-máy-tính-bảng-5.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(35, 'Laptop HP Máy tính bảng 6', 'laptop-hp-máy-tính-bảng-6', 69809216.72, 'Mô tả cho Laptop HP Máy tính bảng 6 thuộc danh mục Máy tính bảng.', 'laptop-hp-máy-tính-bảng-6.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(36, 'Samsung TV Máy tính bảng 7', 'samsung-tv-máy-tính-bảng-7', 31445553.96, 'Mô tả cho Samsung TV Máy tính bảng 7 thuộc danh mục Máy tính bảng.', 'samsung-tv-máy-tính-bảng-7.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(37, 'XBOX Máy tính bảng 8', 'xbox-máy-tính-bảng-8', 77897989.55, 'Mô tả cho XBOX Máy tính bảng 8 thuộc danh mục Máy tính bảng.', 'https://cdn.tgdd.vn/Files/2021/08/12/1374854/xbox_1280x720-800-resize.png', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(38, 'PlayStation 5 Máy tính bảng 9', 'playstation-5-máy-tính-bảng-9', 18685610.50, 'Mô tả cho PlayStation 5 Máy tính bảng 9 thuộc danh mục Máy tính bảng.', 'playstation-5-máy-tính-bảng-9.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(39, 'Laptop HP Máy tính bảng 10', 'laptop-hp-máy-tính-bảng-10', 36326583.02, 'Mô tả cho Laptop HP Máy tính bảng 10 thuộc danh mục Máy tính bảng.', 'laptop-hp-máy-tính-bảng-10.jpg', 3, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(40, 'Samsung Galaxy Phụ kiện 1', 'samsung-galaxy-phụ-kiện-1', 30774139.52, 'Mô tả cho Samsung Galaxy Phụ kiện 1 thuộc danh mục Phụ kiện.', 'samsung-galaxy-phụ-kiện-1.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(41, 'Samsung Monitor Phụ kiện 2', 'samsung-monitor-phụ-kiện-2', 15411666.49, 'Mô tả cho Samsung Monitor Phụ kiện 2 thuộc danh mục Phụ kiện.', 'samsung-monitor-phụ-kiện-2.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(42, 'iPad Pro Phụ kiện 3', 'ipad-pro-phụ-kiện-3', 57746226.99, 'Mô tả cho iPad Pro Phụ kiện 3 thuộc danh mục Phụ kiện.', 'ipad-pro-phụ-kiện-3.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(43, 'Laptop Dell Phụ kiện 4', 'laptop-dell-phụ-kiện-4', 77972207.43, 'Mô tả cho Laptop Dell Phụ kiện 4 thuộc danh mục Phụ kiện.', 'laptop-dell-phụ-kiện-4.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(44, 'Apple TV Phụ kiện 5', 'apple-tv-phụ-kiện-5', 8628294.28, 'Mô tả cho Apple TV Phụ kiện 5 thuộc danh mục Phụ kiện.', 'apple-tv-phụ-kiện-5.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(45, 'Laptop HP Phụ kiện 6', 'laptop-hp-phụ-kiện-6', 54532427.00, 'Mô tả cho Laptop HP Phụ kiện 6 thuộc danh mục Phụ kiện.', 'laptop-hp-phụ-kiện-6.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(46, 'Laptop HP Phụ kiện 7', 'laptop-hp-phụ-kiện-7', 50538738.79, 'Mô tả cho Laptop HP Phụ kiện 7 thuộc danh mục Phụ kiện.', 'laptop-hp-phụ-kiện-7.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(47, 'iPhone Phụ kiện 8', 'iphone-phụ-kiện-8', 33974561.12, 'Mô tả cho iPhone Phụ kiện 8 thuộc danh mục Phụ kiện.', 'iphone-phụ-kiện-8.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(48, 'HP Printer Phụ kiện 9', 'hp-printer-phụ-kiện-9', 33290110.39, 'Mô tả cho HP Printer Phụ kiện 9 thuộc danh mục Phụ kiện.', 'hp-printer-phụ-kiện-9.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(49, 'iPad Pro Phụ kiện 10', 'ipad-pro-phụ-kiện-10', 37584754.26, 'Mô tả cho iPad Pro Phụ kiện 10 thuộc danh mục Phụ kiện.', 'ipad-pro-phụ-kiện-10.jpg', 4, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(50, 'Bose Headphones Tivi 1', 'bose-headphones-tivi-1', 30190652.80, 'Mô tả cho Bose Headphones Tivi 1 thuộc danh mục Tivi.', 'bose-headphones-tivi-1.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(51, 'HP Printer Tivi 2', 'hp-printer-tivi-2', 40563922.03, 'Mô tả cho HP Printer Tivi 2 thuộc danh mục Tivi.', 'hp-printer-tivi-2.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(52, 'Nikon Camera Tivi 3', 'nikon-camera-tivi-3', 76937374.99, 'Mô tả cho Nikon Camera Tivi 3 thuộc danh mục Tivi.', 'nikon-camera-tivi-3.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(53, 'Apple Watch Tivi 4', 'apple-watch-tivi-4', 55845649.09, 'Mô tả cho Apple Watch Tivi 4 thuộc danh mục Tivi.', 'apple-watch-tivi-4.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(54, 'Nikon Camera Tivi 5', 'nikon-camera-tivi-5', 61288325.27, 'Mô tả cho Nikon Camera Tivi 5 thuộc danh mục Tivi.', 'nikon-camera-tivi-5.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(55, 'Samsung Tablet Tivi 6', 'samsung-tablet-tivi-6', 48944407.85, 'Mô tả cho Samsung Tablet Tivi 6 thuộc danh mục Tivi.', 'samsung-tablet-tivi-6.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(56, 'Sony Camera Tivi 7', 'sony-camera-tivi-7', 49009713.46, 'Mô tả cho Sony Camera Tivi 7 thuộc danh mục Tivi.', 'sony-camera-tivi-7.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(57, 'Samsung Monitor Tivi 8', 'samsung-monitor-tivi-8', 77117425.60, 'Mô tả cho Samsung Monitor Tivi 8 thuộc danh mục Tivi.', 'samsung-monitor-tivi-8.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(58, 'PlayStation 5 Tivi 9', 'playstation-5-tivi-9', 45771420.35, 'Mô tả cho PlayStation 5 Tivi 9 thuộc danh mục Tivi.', 'playstation-5-tivi-9.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(59, 'Samsung Tablet Tivi 10', 'samsung-tablet-tivi-10', 46551058.62, 'Mô tả cho Samsung Tablet Tivi 10 thuộc danh mục Tivi.', 'samsung-tablet-tivi-10.jpg', 5, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(60, 'HP Printer Máy ảnh 1', 'hp-printer-máy-ảnh-1', 35904189.96, 'Mô tả cho HP Printer Máy ảnh 1 thuộc danh mục Máy ảnh.', 'hp-printer-máy-ảnh-1.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(61, 'Sony Headphones Máy ảnh 2', 'sony-headphones-máy-ảnh-2', 10299048.28, 'Mô tả cho Sony Headphones Máy ảnh 2 thuộc danh mục Máy ảnh.', 'sony-headphones-máy-ảnh-2.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(62, 'Laptop HP Máy ảnh 3', 'laptop-hp-máy-ảnh-3', 65406008.40, 'Mô tả cho Laptop HP Máy ảnh 3 thuộc danh mục Máy ảnh.', 'laptop-hp-máy-ảnh-3.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(63, 'Samsung Monitor Máy ảnh 4', 'samsung-monitor-máy-ảnh-4', 23348837.71, 'Mô tả cho Samsung Monitor Máy ảnh 4 thuộc danh mục Máy ảnh.', 'samsung-monitor-máy-ảnh-4.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(64, 'Laptop HP Máy ảnh 5', 'laptop-hp-máy-ảnh-5', 37507549.59, 'Mô tả cho Laptop HP Máy ảnh 5 thuộc danh mục Máy ảnh.', 'laptop-hp-máy-ảnh-5.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(65, 'Apple Watch Máy ảnh 6', 'apple-watch-máy-ảnh-6', 53625383.67, 'Mô tả cho Apple Watch Máy ảnh 6 thuộc danh mục Máy ảnh.', 'apple-watch-máy-ảnh-6.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(66, 'Canon Printer Máy ảnh 7', 'canon-printer-máy-ảnh-7', 7419689.49, 'Mô tả cho Canon Printer Máy ảnh 7 thuộc danh mục Máy ảnh.', 'canon-printer-máy-ảnh-7.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(67, 'Samsung Galaxy Máy ảnh 8', 'samsung-galaxy-máy-ảnh-8', 26108513.87, 'Mô tả cho Samsung Galaxy Máy ảnh 8 thuộc danh mục Máy ảnh.', 'samsung-galaxy-máy-ảnh-8.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(68, 'PlayStation 5 Máy ảnh 9', 'playstation-5-máy-ảnh-9', 33917590.51, 'Mô tả cho PlayStation 5 Máy ảnh 9 thuộc danh mục Máy ảnh.', 'playstation-5-máy-ảnh-9.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(69, 'XBOX Máy ảnh 10', 'xbox-máy-ảnh-10', 65767368.50, 'Mô tả cho XBOX Máy ảnh 10 thuộc danh mục Máy ảnh.', 'xbox-máy-ảnh-10.jpg', 6, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(70, 'Bose Headphones Đồng hồ 1', 'bose-headphones-đồng-hồ-1', 50730400.57, 'Mô tả cho Bose Headphones Đồng hồ 1 thuộc danh mục Đồng hồ.', 'bose-headphones-đồng-hồ-1.jpg', 7, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(71, 'Samsung Monitor Đồng hồ 2', 'samsung-monitor-đồng-hồ-2', 50961467.44, 'Mô tả cho Samsung Monitor Đồng hồ 2 thuộc danh mục Đồng hồ.', 'samsung-monitor-đồng-hồ-2.jpg', 7, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(72, 'Apple TV Đồng hồ 3', 'apple-tv-đồng-hồ-3', 31200955.53, 'Mô tả cho Apple TV Đồng hồ 3 thuộc danh mục Đồng hồ.', 'apple-tv-đồng-hồ-3.jpg', 7, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(73, 'LG TV Đồng hồ 4', 'lg-tv-đồng-hồ-4', 4758695.27, 'Mô tả cho LG TV Đồng hồ 4 thuộc danh mục Đồng hồ.', 'lg-tv-đồng-hồ-4.jpg', 7, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(74, 'Bose Headphones Đồng hồ 5', 'bose-headphones-đồng-hồ-5', 55295850.20, 'Mô tả cho Bose Headphones Đồng hồ 5 thuộc danh mục Đồng hồ.', 'bose-headphones-đồng-hồ-5.jpg', 7, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0),
(75, 'Sony Camera Đồng hồ 6', 'sony-camera-đồng-hồ-6', 32938812.26, 'Mô tả cho Sony Camera Đồng hồ 6 thuộc danh mục Đồng hồ.', 'sony-camera-đồng-hồ-6.jpg', 7, '2025-01-03 09:54:26', '2025-01-03 09:54:26', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `username`, `deleted_at`, `role_id`, `phone`, `address`) VALUES
(1, 'Thanh QuocDang Dang Quoc', 'dangquocthanh2812@gmail.com', NULL, '$2y$12$402gDAif7AcD2wXaOY82tOQCT1F0CeJlsKtjZSwFIMvSsoItrOPie', NULL, '2025-01-02 21:08:53', '2025-01-02 21:08:53', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'quocthinh', 'quocthinh@gmail.com', NULL, '$2y$12$S3XuOVmR6bX/SeBqVI72HuV6hIeKFc6m8PPg.XrIrpamgiYq08SeC', NULL, '2025-01-02 21:36:02', '2025-01-02 21:36:02', NULL, NULL, NULL, 2, NULL, NULL),
(11, 'kimtuyen', 'kimtuyen@gmail.com', NULL, '$2y$12$McafdLJGgsg5IZkImIhIR.ZX8g0H8YlfwYCI2ieXjyj92o.nsi/RC', NULL, '2025-01-03 02:27:15', '2025-01-03 02:27:15', NULL, NULL, NULL, 2, NULL, NULL),
(14, 'camtu', 'camtu@gmail.com', NULL, '$2y$12$jLCgVhT3NLE1ua/m9FVCLevZOnwb5zXSpMK6lWOJ/RQn5Lqty/kOK', NULL, '2025-01-06 07:49:09', '2025-01-06 07:49:09', NULL, NULL, NULL, 2, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_order_id_foreign` (`order_id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
