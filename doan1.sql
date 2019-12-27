-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2019 lúc 12:37 PM
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
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `userId`, `createdAt`, `content`) VALUES
(93, 66, 51, '2019-12-27 15:41:30', 'aaa'),
(94, 66, 51, '2019-12-27 15:50:29', 'fsafsaf'),
(95, 66, 51, '2019-12-27 16:00:41', 'fasfasf'),
(96, 65, 51, '2019-12-27 16:24:39', 'qew'),
(97, 66, 51, '2019-12-27 16:25:57', 'asfsf'),
(98, 66, 51, '2019-12-27 16:35:44', 'afasf'),
(99, 66, 51, '2019-12-27 16:35:49', 'fsafsfas'),
(100, 66, 51, '2019-12-27 16:36:53', 'asfsaf'),
(101, 66, 51, '2019-12-27 16:36:58', 'ha ha'),
(102, 66, 51, '2019-12-27 17:24:46', 'asfasf'),
(103, 66, 51, '2019-12-27 17:24:53', 'asfasfssssssssssssssssssssssssssssss'),
(104, 66, 51, '2019-12-27 17:29:04', 'asfsaf'),
(105, 66, 51, '2019-12-27 17:29:08', 'asfasfasfasf'),
(106, 65, 51, '2019-12-27 17:29:56', 'asfasf'),
(107, 65, 51, '2019-12-27 17:30:02', 'asfasfasfsa'),
(108, 65, 51, '2019-12-27 17:30:21', 'asfasfasf'),
(109, 65, 51, '2019-12-27 17:32:47', 'a'),
(110, 66, 51, '2019-12-27 17:33:07', 'a');

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
(51, 49, '2019-12-27 16:45:52'),
(51, 52, '2019-12-27 18:37:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like`
--

CREATE TABLE `like` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `icon_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `userId`, `createdAt`, `icon_id`) VALUES
(107, 62, 51, '2019-12-27 14:49:35', NULL),
(129, 66, 49, '2019-12-27 15:16:47', NULL),
(131, 64, 49, '2019-12-27 15:16:59', NULL),
(132, 65, 49, '2019-12-27 15:17:01', NULL),
(136, 65, 51, '2019-12-27 17:32:52', NULL),
(137, 66, 51, '2019-12-27 17:33:04', NULL),
(138, 64, 51, '2019-12-27 18:36:27', NULL),
(139, 63, 51, '2019-12-27 18:36:57', NULL);

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
(26, 'alo \r\n', 52, 51, 1, '2019-12-17 13:38:47'),
(28, 'And second of all, it turns out this algorithm is actually less efficient. When we talk about how to do modular exponentiations -- we\'re gonna do that in the last segment in this module -- you\'ll see that the running time to compute this exponentiation is actually cubic in the size of P. So this will take roughly log cube of P, whereas if you remember, Euclid\'s algorithm was able to compute the inverse in quadratic time in the representation of P. So not only is this algorithm less general it only works for primes, it\'s also less efficient. So score one for Euclid.', 52, 51, 1, '2019-12-17 13:39:58'),
(29, 'alo thang lol', 49, 52, 0, '2019-12-22 13:31:13'),
(30, 'alo thang lol', 52, 49, 1, '2019-12-22 13:31:13'),
(31, 'alo thang lol', 49, 52, 0, '2019-12-22 13:31:32'),
(32, 'alo thang lol', 52, 49, 1, '2019-12-22 13:31:32'),
(33, 'alooo', 49, 51, 0, '2019-12-22 13:31:44'),
(36, 'êrr', 49, 51, 1, '2019-12-26 03:46:39'),
(38, 'abc', 52, 51, 1, '2019-12-26 15:12:55');

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
-- Cấu trúc bảng cho bảng `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `n_type` int(11) NOT NULL,
  `forUserID` int(11) NOT NULL,
  `fromUserID` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `notify`
--

INSERT INTO `notify` (`id`, `n_type`, `forUserID`, `fromUserID`, `createdAt`) VALUES
(31, 1, 51, 49, '2019-12-27 16:44:40'),
(32, 1, 51, 49, '2019-12-27 16:45:52'),
(33, 1, 51, 52, '2019-12-27 17:35:01'),
(34, 1, 51, 52, '2019-12-27 18:37:13');

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
(62, 51, 'HELLO', '2019-12-20 14:22:12'),
(63, 52, '1223431', '2019-12-20 14:25:40'),
(64, 51, '22222222222222', '2019-12-20 14:26:16'),
(65, 51, '12', '2019-12-21 13:39:19'),
(66, 49, 'alo', '2019-12-21 15:13:06');

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
(49, 'Dương Huy', '0969323317', 'ndhuy2711@gmail.com', '$2y$10$ZfLU5jhOes6qD2HdshT3IuIQI4RcrCXZmMssopVTqxT240EZVdQnq', 1, 1, '', '230892'),
(51, 'nghiep ', '0969323317', 'thnghiep.17ck1@gmail.com', '$2y$10$Wslid05CCjsLn01fEsenlein8tBe9kdqzxeemJ8mYqp.3fPGUSQuq', 1, 0, '268266', '230892'),
(52, 'nghiep tram111111', '', 'abc@gmail.com', '$2y$10$ZfLU5jhOes6qD2HdshT3IuIQI4RcrCXZmMssopVTqxT240EZVdQnq', 0, 1, '', '230892');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk_post_comment_post` (`post_id`),
  ADD KEY `pk_post_comment_user` (`userId`);

--
-- Chỉ mục cho bảng `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`userId1`,`userId2`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_like_users_pk` (`userId`),
  ADD KEY `posts_like_posts_1` (`post_id`),
  ADD KEY `posts_like_like_icon_1` (`icon_id`);

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
-- Chỉ mục cho bảng `notify`
--
ALTER TABLE `notify`
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
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `name`
--
ALTER TABLE `name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
