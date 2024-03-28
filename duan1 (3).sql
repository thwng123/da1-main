-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 21, 2024 lúc 09:23 AM
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
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `content` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `quantity` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `luotxem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `image`, `description`, `quantity`, `cate_id`, `luotxem`) VALUES
(4, 'Casual Hoodie Soli With Sweaters', 39.06, 'girl1.jpg', 'Sleeve Length: Long Sleeve\r\n\r\nSleeve Style: Regular Sleeve\r\n\r\nNeckline: Hooded\r\n\r\nFashion Element: Pocket\r\n\r\n', 100, 2, 70),
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
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cate_id` (`cate_id`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
