-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2019 lúc 04:08 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friendship`
--

CREATE TABLE `friendship` (
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `friendship`
--

INSERT INTO `friendship` (`userId1`, `userId2`, `createdAt`) VALUES
(49, 51, '2019-12-17 13:25:11'),
(49, 52, '2019-12-17 13:40:01'),
(51, 49, '2019-12-17 13:25:30'),
(51, 52, '2019-12-17 13:39:42'),
(52, 49, '2019-12-17 13:39:26'),
(52, 51, '2019-12-17 13:39:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `content`, `userId1`, `userId2`, `type`, `createdAt`) VALUES
(1, 'ă', 51, 49, 0, '2019-12-17 06:35:18'),
(2, 'ă', 49, 51, 1, '2019-12-17 06:35:18'),
(3, 'ă', 51, 49, 0, '2019-12-17 06:35:25'),
(4, 'ă', 49, 51, 1, '2019-12-17 06:35:25'),
(5, 'ă', 51, 49, 0, '2019-12-17 06:36:29'),
(6, 'ă', 49, 51, 1, '2019-12-17 06:36:29'),
(7, 'alo', 49, 51, 0, '2019-12-17 06:37:04'),
(8, 'alo', 51, 49, 1, '2019-12-17 06:37:04'),
(9, 'lo', 52, 49, 0, '2019-12-17 06:40:18'),
(10, 'lo', 49, 52, 1, '2019-12-17 06:40:18'),
(11, 'hi', 51, 49, 0, '2019-12-17 13:35:28'),
(12, 'hi', 49, 51, 1, '2019-12-17 13:35:28'),
(13, 'Euclid thì khác, cũng làm việc với modulo là hợp số thứ hai, thuật toán này ít hiệu quả hơn khi ta nói về thuật toán tính lũy thừa theo modulo ở phần cuối của video bạn sẽ thấy thời gian chạy của nó sẽ là lập phương chiều dài của p hay cách khác là log của P lập phương thuật toán của Euclid thì lại có thể tính nghịch đảo trong thời gian tỉ lệ với bình phương chiều dài của p thế là thuật toán mới này vừa ít tổng quát hơn và cũng kém hiệu quả hơn so với Euclid.\r\n', 51, 49, 0, '2019-12-17 13:35:43'),
(14, 'Euclid thì khác, cũng làm việc với modulo là hợp số thứ hai, thuật toán này ít hiệu quả hơn khi ta nói về thuật toán tính lũy thừa theo modulo ở phần cuối của video bạn sẽ thấy thời gian chạy của nó sẽ là lập phương chiều dài của p hay cách khác là log của P lập phương thuật toán của Euclid thì lại có thể tính nghịch đảo trong thời gian tỉ lệ với bình phương chiều dài của p thế là thuật toán mới này vừa ít tổng quát hơn và cũng kém hiệu quả hơn so với Euclid.\r\n', 49, 51, 1, '2019-12-17 13:35:43'),
(15, 'ê mày', 51, 52, 0, '2019-12-17 13:36:59'),
(16, 'ê mày', 52, 51, 1, '2019-12-17 13:36:59'),
(17, 'alo \r\n', 51, 52, 0, '2019-12-17 13:37:18'),
(18, 'alo \r\n', 52, 51, 1, '2019-12-17 13:37:18'),
(19, 'alo \r\n', 51, 52, 0, '2019-12-17 13:38:05'),
(20, 'alo \r\n', 52, 51, 1, '2019-12-17 13:38:05'),
(21, 'alo \r\n', 51, 52, 0, '2019-12-17 13:38:41'),
(22, 'alo \r\n', 52, 51, 1, '2019-12-17 13:38:41'),
(23, 'alo \r\n', 51, 52, 0, '2019-12-17 13:38:43'),
(24, 'alo \r\n', 52, 51, 1, '2019-12-17 13:38:43'),
(25, 'alo \r\n', 51, 52, 0, '2019-12-17 13:38:47'),
(26, 'alo \r\n', 52, 51, 1, '2019-12-17 13:38:47'),
(27, 'And second of all, it turns out this algorithm is actually less efficient. When we talk about how to do modular exponentiations -- we\'re gonna do that in the last segment in this module -- you\'ll see that the running time to compute this exponentiation is actually cubic in the size of P. So this will take roughly log cube of P, whereas if you remember, Euclid\'s algorithm was able to compute the inverse in quadratic time in the representation of P. So not only is this algorithm less general it only works for primes, it\'s also less efficient. So score one for Euclid.', 51, 52, 0, '2019-12-17 13:39:58'),
(28, 'And second of all, it turns out this algorithm is actually less efficient. When we talk about how to do modular exponentiations -- we\'re gonna do that in the last segment in this module -- you\'ll see that the running time to compute this exponentiation is actually cubic in the size of P. So this will take roughly log cube of P, whereas if you remember, Euclid\'s algorithm was able to compute the inverse in quadratic time in the representation of P. So not only is this algorithm less general it only works for primes, it\'s also less efficient. So score one for Euclid.', 52, 51, 1, '2019-12-17 13:39:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `name`
--

CREATE TABLE `name` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `name`
--

INSERT INTO `name` (`id`, `fullname`, `tel`) VALUES
(1, 'ádf', '123'),
(2, 'NGHIEP', '123467'),
(3, 'NGHIEP1999', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `userId`, `content`, `createdAt`) VALUES
(11, 50, 'NGHIỆP TRẦM', '2019-12-06 05:22:03'),
(12, 51, 'nghiep\r\n', '2019-12-10 05:59:46'),
(13, 51, 'nghiep tram\r\n', '2019-12-10 06:29:22'),
(14, 51, 'ưqe', '2019-12-13 05:23:29'),
(15, 51, 'nghiệp trầm', '2019-12-13 05:25:13'),
(16, 51, 'nghiệp nè hihihi\r\n', '2019-12-13 05:39:17'),
(17, 51, 'nghiêp', '2019-12-13 05:42:09'),
(18, 51, 'QƯE', '2019-12-13 05:48:36'),
(19, 51, 'qew', '2019-12-13 06:06:48'),
(20, 51, 'w', '2019-12-13 06:07:16'),
(21, 51, 'nghiệp trầm', '2019-12-14 05:33:16'),
(22, 51, 'nghiep', '2019-12-14 05:38:05'),
(23, 51, '12345', '2019-12-14 05:39:18'),
(24, 51, 'nghiệ tràm', '2019-12-14 05:40:02'),
(25, 51, 'nghiệp', '2019-12-14 05:55:06'),
(26, 51, 'nghiệp hữu', '2019-12-14 05:55:41'),
(27, 51, '123', '2019-12-15 12:46:14'),
(28, 51, 'NGHIỆP TRẦM', '2019-12-15 12:50:28'),
(29, 51, '123qeqw', '2019-12-15 12:58:18'),
(30, 51, 'nghiệp trầm', '2019-12-15 13:15:09'),
(31, 51, 'NGHIỆP', '2019-12-15 13:21:30'),
(32, 51, '123', '2019-12-15 13:22:36'),
(33, 49, 'nghiệp', '2019-12-17 06:13:41'),
(34, 51, 'HELLO MẤY CƯNG', '2019-12-17 12:51:21'),
(35, 51, 'hi im go cu', '2019-12-17 13:48:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `hasAvatar` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `code` varchar(16) NOT NULL,
  `code2` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `email`, `password`, `hasAvatar`, `status`, `code`, `code2`) VALUES
(49, 'nghiep', '0969323317', 'ndhuy2711@gmail.com', '$2y$10$ZNKylS793H6k0fMnGWe6DulCxjM/NpdDvmWHIW6HuZErc/nVymLZC', 1, 1, '', '585522'),
(51, 'ipx', '0969323317', 'thnghiep.17ck1@gmail.com', '$2y$10$3/3Kkmio6kzZHcTyClmRquNfKvOkTci/8aKNvSe2Lvu6xjpjj.KRm', 1, 0, '268266', '585522'),
(52, 'nghiep tram111111', '', 'abc@gmail.com', '$2y$10$iwB9IKG5D93Xr7WRVSC/TufwPqbMmV.4i8bIzlpJKcpO/KN26vopO', 0, 1, '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`userId1`,`userId2`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `name`
--
ALTER TABLE `name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
