-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 10, 2024 lúc 10:51 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `create_at` varchar(50) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`blog_id`, `image`, `tittle`, `content`, `create_at`, `author`) VALUES
(1, 'blog1.jpg', 'Mercedes Benz– Mirror To The Soul 360', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore labore placeat ut est minima deleniti animi nemo quae et qui eum, quibusdam voluptates sit consectetur doloribus debitis? Modi, ab eum!', '30 Oct 2024', 'Ecommerce Themes'),
(2, 'blog2.jpg', 'Trải nghiệm thời trang đầu tiên của Dior F/W 2023', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore labore placeat ut est minima deleniti animi nemo quae et qui eum, quibusdam voluptates sit consectetur doloribus debitis? Modi, ab eum!', '30 Oct 2024', 'Ecommerce Themes'),
(3, 'blog3.jpg', 'London Fashion Week & Royal Day', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore labore placeat ut est minima deleniti animi nemo quae et qui eum, quibusdam voluptates sit consectetur doloribus debitis? Modi, ab eum!', '30 Oct 2024', 'Ecommerce Themes');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `status`) VALUES
(178, 49, 6, 1, 0),
(179, 49, 11, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cate_id`, `cate_name`) VALUES
(1, 'Nam'),
(2, 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Đen'),
(2, 'Trắng'),
(3, 'Đỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comments_id`, `content`, `product_id`, `user_id`, `date`) VALUES
(7, 'tốt', 18, 49, ' 09:15:30am 09/04/2024'),
(11, 'tệ', 18, 49, ' 10:59:06am 09/04/2024'),
(12, 'tuyệt vời', 18, 49, ' 10:59:12am 09/04/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_phone` varchar(250) NOT NULL,
  `user_address` varchar(250) NOT NULL,
  `total_bill` float NOT NULL,
  `status_delivery` int(11) NOT NULL COMMENT 'Trang thái vận chuyển đơn hàng: \r\nDưới đây đang lấy theo trạng thái của shopee.\r\n0: chờ xác nhận\r\n1: chờ lấy hàng\r\n2: chờ giao hàng\r\n3: đã giao\r\n-1: đã hủy\r\n',
  `status_payment` int(11) NOT NULL COMMENT 'Trạng thái thanh toán:\r\n0: chưa thanh toán\r\n1: đã thanh toán\r\n-1: đơn hàng đã hủy',
  `created_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày tạo đơn hàng',
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'ngày cập nhật cuối cùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `total_bill`, `status_delivery`, `status_payment`, `created_at`, `updated_at`) VALUES
(56, 49, 'thwngpro12', 'thuonghihi88@gmail.com', '0335594204', 'Bac Ninh', 78.77, 0, 0, '2024-04-03 23:00:14', '2024-04-03 23:00:14'),
(57, 50, 'thuonghihe', 'tuong@gmail.com', '0123456789', 'LAo cai', 119.81, 3, 0, '2024-04-03 23:23:16', '2024-04-03 23:23:16'),
(58, 49, 'thwngpro12', 'thuonghihi88@gmail.com', '335594204', 'Bắc Ninh', 152.18, 0, 0, '2024-04-04 13:17:54', '2024-04-04 13:17:54'),
(59, 50, 'thwngpro12', 'thuonghihi88@gmail.com', '0335594204', 'Bâc Ninh', 64.46, 1, 1, '2024-04-04 13:35:59', '2024-04-04 13:35:59'),
(60, 50, 'thuong', ' thuong@gamil.com	', '120932', 'ASD', 25.4, 0, 0, '2024-04-04 13:36:36', '2024-04-04 13:36:36'),
(61, 50, 'thuonghihe', 'tuong@gmail.com', '0123456789', 'LAo cai', 25.4, 0, 1, '2024-04-04 13:36:57', '2024-04-04 13:36:57'),
(62, 50, 'thuong', ' thuong@gamil.com	', '0120932', 'Bắc Ninh', 55.94, 0, 1, '2024-04-04 21:33:14', '2024-04-04 21:33:14'),
(63, 50, 'thwngpro12', 'thuonghihi88@gmail.com', '335594204', 'Bắc Nin', 79.67, 1, 0, '2024-04-04 21:38:16', '2024-04-04 21:38:16'),
(64, 49, 'thwngpro123', 'thuonghihi88@gmail.com', '0335594204', 'Bắc Ninh', 25.4, 1, 1, '2024-04-04 21:47:36', '2024-04-04 21:47:36'),
(65, 49, 'thwngpro12', 'thuonghihi88@gmail.com', '0335594204', 'Bắc Ninh', 187.64, 0, 1, '2024-04-04 21:49:14', '2024-04-04 21:49:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL COMMENT 'ưu tiên lưu giá price hơn regular.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(58, 56, 9, 1, 27.97),
(59, 56, 4, 2, 25.4),
(60, 57, 17, 3, 25.85),
(61, 57, 11, 1, 42.26),
(62, 58, 4, 1, 25.4),
(63, 58, 11, 3, 42.26),
(64, 59, 4, 1, 25.4),
(65, 59, 6, 1, 39.06),
(66, 60, 4, 1, 25.4),
(67, 61, 4, 1, 25.4),
(68, 62, 9, 2, 27.97),
(69, 63, 17, 2, 25.85),
(70, 63, 9, 1, 27.97),
(71, 64, 4, 1, 25.4),
(72, 65, 9, 2, 27.97);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantitys` int(11) DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `luotxem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `image`, `description`, `quantitys`, `cate_id`, `luotxem`) VALUES
(4, 'Casual Hoodie Soli With Sweaters', 25.4, 'girl1.jpg', 'Sleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve\r\n\r\nNeckline: Hooded\r\n\r\nFashion Element: Pocket\r\n\r\n', 25, 2, 70),
(6, 'Women\'s Retro Solid', 39.06, 'girl2.webp', 'Sleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve\r\n\r\nNeckline: Hooded\r\n\r\nFashion Element: Pocket', 100, 2, 0),
(9, 'Long Sleeve Solid Color Hoodie Sweaters', 27.97, 'girl3.webp', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 1000, 2, 100),
(10, 'Marshall Portable Bluetooth', 20.05, 'product4.jpg', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 100, 1, 0),
(11, 'Hooded Fake Two Pieces', 42.26, 'boy.webp', 'Style: Loose\r\n\r\nSleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve', 10, 1, 0),
(12, 'Lamb Wool Female Motorcycle', 62.91, 'girl4.webp', 'Style: Loose\r\n\r\nSleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve', 200, 2, 20),
(14, 'Women\'s One-Piece ', 65.85, 'girl5.webp', 'Style: Slim Fit\r\n\r\nSleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve', 100, 2, 10),
(16, 'Long Sleeve Stitching Coats', 44.31, 'girl6.webp', 'Style: Slim Fit\r\n\r\nNeckline: Stand Collar\r\n\r\nFashion Element: Pocket', 100, 2, 0),
(17, 'Koss KPH7 Portable', 25.85, 'product16.jpg', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 100, 1, 0),
(18, 'Beats Solo Wireless', 23.1, 'product27.jpg', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 100, 1, 0),
(19, 'Bose SoundLink Bluetooth', 49.76, 'product14.jpg', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 100, 1, 0),
(20, 'Apple IPad With Retina', 54.54, 'product20.jpg', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 1000, 1, 0),
(22, 'Women\'s Hipster Zipper', 34.71, 'girl8.jpg', 'Style: Loose\r\n\r\nSleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve', 20, 2, 0),
(23, 'Women\'s Oblique Zipper Hooded', 61.6, 'girl7.webp', 'Style: Slim Fit\r\n\r\nNeckline: Suit Collar\r\n\r\nSleeve Length: Long Sleeve', 30, 2, 0),
(24, 'Women\'s Korean Style', 27.39, 'girl9.webp', 'Style: Loose\r\n\r\nNeckline: V-neck\r\n\r\nSleeve Length: Long Sleeve', 30, 2, 0),
(25, 'Ben Folds Five', 15, 'boy7.jpg', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 100, 1, NULL),
(26, 'Long Sleeve T-Shirt', 20, 'boy8.webp', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG\r\n\r\n', 110, 1, NULL),
(29, 'All These Flavors', 16, 'boy11.webp', 'Chất liệu Airycool Điều Hòa Thành phần: 88%Nylon, 12%Spandex VẢI CHẠM MÁT, HẠ NHIỆT - Công nghệ làm mát Freezing giúp tiêu tán bức xạ nhiệt nhanh chóng. Bề vải chạm mát NGAY TỨC THÌ. KHÔNG BAI DÃO, SỢI CO GIÃN TÔN DÁNG', 1000, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(30) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone`, `role`, `image`) VALUES
(1, ' Nguyễn Văn Hoàng', ' 123', ' behoang469@gmail.com', 865312858, 1, 'Anh-cristiano-ronaldo-8.jpg'),
(2, 'Nguyễn Văn Thưởng', '1234', 'thuongthuong345@gmail.com', 1285779257, 0, 'admin1.jpg'),
(3, 'Nguyễn Thị Hà', '123456', 'hanguyen267@gmail.com', 2147483647, 0, 'nhanvien1.jpg'),
(5, '    Hoàngg Nguyễn', '    1234567', ' hoang@gmail.com', 915809771, 1, 'anh1.jpg'),
(41, 'nguyenvanthuong', '1233', 'thuonghihi8@gmail.com', 334422244, 0, 'boy.jpg'),
(49, 'thwngpro12', '123', 'thuonghihi88@gmail.com', 335594204, 0, 'girl.jpg'),
(50, ' thuong', ' 12', ' thuong@gamil.com', 120932, 0, '1.jpg'),
(51, 'nguyenvanthuong1112', '123', 'haiame@gmail.com', NULL, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
