-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 23, 2019 lúc 02:02 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tenis_new`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fixture`
--

CREATE TABLE `fixture` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) DEFAULT NULL,
  `tournament_playing_category_id` int(11) DEFAULT NULL,
  `first_registration_id` int(11) DEFAULT NULL,
  `second_registration_id` int(11) DEFAULT NULL,
  `round` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `fixture`
--

INSERT INTO `fixture` (`id`, `registration_id`, `tournament_playing_category_id`, `first_registration_id`, `second_registration_id`, `round`) VALUES
(1, 1, 1, 1, 2, 1),
(2, 2, 1, 3, 4, 1),
(3, 3, 1, 5, 6, 1),
(4, 4, 1, 7, 8, 1),
(5, 5, 1, 9, 10, 1),
(6, 6, 1, 11, 12, 1),
(7, 7, 1, 13, 14, 1),
(8, 8, 1, 15, 16, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `vn_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `player`
--

INSERT INTO `player` (`id`, `vn_name`) VALUES
(1, 'Nguyễn Văn A'),
(2, 'Nguyễn Văn B'),
(3, 'Nguyễn Văn D'),
(4, 'Nguyễn Văn E'),
(5, 'Nguyễn Văn F'),
(6, 'Nguyễn Văn G'),
(7, 'Nguyễn Văn H'),
(8, 'Nguyễn Văn I'),
(9, 'Nguyễn Văn K'),
(10, 'Nguyễn Văn L'),
(11, 'Nguyễn Văn M'),
(12, 'Nguyễn Văn N'),
(13, 'Nguyễn Văn O'),
(14, 'Nguyễn Văn O'),
(15, 'Nguyễn Văn M'),
(16, 'Nguyễn Văn N');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playing_category`
--

CREATE TABLE `playing_category` (
  `id` int(11) NOT NULL,
  `vn_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_sapo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `vn_detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `vn_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` tinyint(3) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `playing_category`
--

INSERT INTO `playing_category` (`id`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_sapo`, `vn_detail`, `vn_description`, `status`, `created`) VALUES
(1, 'Đơn nam', 'don-nam', 'Đơn nam', 'Đơn nam', NULL, NULL, 'Đơn nam', 1, 1548150277),
(2, 'Đơn nữ', 'don-nu', 'Đơn nữ', 'Đơn nữ', NULL, NULL, 'Đơn nữ', 1, 1548150270);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playing_in`
--

CREATE TABLE `playing_in` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) DEFAULT NULL,
  `seed` int(11) DEFAULT NULL,
  `tournament_playing_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `playing_in`
--

INSERT INTO `playing_in` (`id`, `registration_id`, `seed`, `tournament_playing_category_id`) VALUES
(1, 1, NULL, 1),
(2, 2, NULL, 1),
(3, 3, NULL, 1),
(4, 4, NULL, 1),
(5, 5, NULL, 1),
(6, 6, NULL, 1),
(7, 7, NULL, 1),
(8, 8, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `registration`
--

INSERT INTO `registration` (`id`, `date`) VALUES
(1, '2019-01-21 03:00:00'),
(2, '2019-01-21 05:00:00'),
(3, '2019-01-21 14:00:00'),
(4, '2019-01-21 15:00:00'),
(5, '2019-01-21 16:00:00'),
(6, '2019-01-21 18:00:00'),
(7, '2019-01-21 19:00:00'),
(8, '2019-01-21 11:00:00'),
(9, '2019-01-21 10:00:00'),
(10, '2019-01-21 08:00:00'),
(11, '2019-01-21 11:17:00'),
(12, '2019-01-21 08:38:00'),
(13, '2019-01-21 15:17:00'),
(14, '2019-01-21 19:20:00'),
(15, '2019-01-21 16:00:00'),
(16, '2019-01-21 07:00:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `registration_player`
--

CREATE TABLE `registration_player` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) DEFAULT NULL,
  `player_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `registration_player`
--

INSERT INTO `registration_player` (`id`, `registration_id`, `player_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 16, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `set_score`
--

CREATE TABLE `set_score` (
  `id` int(11) NOT NULL,
  `fixture_id` int(11) DEFAULT NULL,
  `set_number` int(11) DEFAULT NULL,
  `first_registration_games` int(11) DEFAULT NULL,
  `second_registration_games` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `set_score`
--

INSERT INTO `set_score` (`id`, `fixture_id`, `set_number`, `first_registration_games`, `second_registration_games`) VALUES
(1, 1, 1, 6, 4),
(2, 2, 1, 6, 3),
(3, 3, 1, 6, 1),
(4, 4, 1, 6, 2),
(5, 5, 1, 6, 0),
(6, 6, 1, 6, 1),
(7, 7, 1, 6, 4),
(8, 8, 1, 6, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `vn_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `vn_sapo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `vn_detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `number_of_rounds` int(11) DEFAULT NULL,
  `tournament_type_id` int(11) DEFAULT NULL,
  `surface_type_id` int(11) DEFAULT NULL,
  `image_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tournament`
--

INSERT INTO `tournament` (`id`, `cid`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `vn_sapo`, `vn_detail`, `number_of_rounds`, `tournament_type_id`, `surface_type_id`, `image_link`, `image_list`, `status`, `created`) VALUES
(1, 1, 'Úc mở rộng 2019', NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tournament_playing_category`
--

CREATE TABLE `tournament_playing_category` (
  `id` int(11) NOT NULL,
  `tournament_id` int(11) DEFAULT NULL,
  `playing_category_id` int(11) DEFAULT NULL,
  `total_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tournament_playing_category`
--

INSERT INTO `tournament_playing_category` (`id`, `tournament_id`, `playing_category_id`, `total_member`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tournament_type`
--

CREATE TABLE `tournament_type` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `vn_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vn_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `vn_sapo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `vn_detail` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_list` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tournament_type`
--

INSERT INTO `tournament_type` (`id`, `pid`, `vn_name`, `vn_slug`, `vn_keyword`, `vn_title`, `vn_description`, `vn_sapo`, `vn_detail`, `image_link`, `image_list`, `position`, `status`, `created`) VALUES
(1, 0, 'Úc mở rộng', 'uc-mo-rong', 'Úc mở rộng', 'Úc mở rộng', 'Úc mở rộng', NULL, NULL, NULL, NULL, 1, 1, 1548145043),
(2, 0, 'Thép và những người bạn', 'thep-va-nhung-nguoi-ban', 'Thép và những người bạn', 'Thép và những người bạn', 'Thép và những người bạn', NULL, NULL, NULL, NULL, NULL, 1, 1548144976);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `tid`, `username`, `password`, `name`, `phone`, `email`, `address`, `status`, `created`) VALUES
(1, 4, 'admin', '7db923d5d5f23110cfc9cd0b858dbd97', 'Thiên', '01647884720', 'thienkbang1123@gmail.com', 'Hồ Chí Minh', 1, 14565),
(3, 4, 'triviet', '215bd54fbb7be28fa7b4b8ff48ecf53c', 'Cty Trí Việt', '0903 636 249', 'kinhdoanh@triviet.net', '311K13, Đường số 8, Khu phố 1, Phường An Phú,Quận 2, Tp.Hồ Chí Minh,Việt Nam', 1, 1529052420),
(5, 1, NULL, '7db923d5d5f23110cfc9cd0b858dbd97', 'Thiên', '0961800223', 'langthien.nina@gmail.com', 'Hồ Chí Minh', 1, 1531205346);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `fixture`
--
ALTER TABLE `fixture`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playing_category`
--
ALTER TABLE `playing_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playing_in`
--
ALTER TABLE `playing_in`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `registration_player`
--
ALTER TABLE `registration_player`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `set_score`
--
ALTER TABLE `set_score`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tournament_playing_category`
--
ALTER TABLE `tournament_playing_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tournament_type`
--
ALTER TABLE `tournament_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `fixture`
--
ALTER TABLE `fixture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `playing_category`
--
ALTER TABLE `playing_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `playing_in`
--
ALTER TABLE `playing_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `registration_player`
--
ALTER TABLE `registration_player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `set_score`
--
ALTER TABLE `set_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tournament_playing_category`
--
ALTER TABLE `tournament_playing_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tournament_type`
--
ALTER TABLE `tournament_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
