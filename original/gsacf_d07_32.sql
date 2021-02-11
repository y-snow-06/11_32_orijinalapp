-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 2 月 11 日 04:05
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d07_32`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `diary_table`
--

CREATE TABLE `diary_table` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diary` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `weather` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `diary_table`
--

INSERT INTO `diary_table` (`id`, `title`, `diary`, `DateCreated`, `created_at`, `updated_at`, `weather`) VALUES
(2, '', '水をあげる', '2021-01-07', '2021-01-07 01:08:20', '2021-01-07 01:08:20', '晴れ'),
(3, '玉ねぎ植える', 'テスト　玉ねぎ植える', '2021-01-07', '2021-01-07 13:34:12', '2021-01-07 13:34:12', '晴れ'),
(4, '枯れる', 'トマト枯れる', '2021-01-08', '2021-01-07 14:23:15', '2021-01-07 14:23:15', '雪');

-- --------------------------------------------------------

--
-- テーブルの構造 `file_db`
--

CREATE TABLE `file_db` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insert_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `todo_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `like_table`
--

INSERT INTO `like_table` (`id`, `user_id`, `todo_id`, `created_at`) VALUES
(1, 0, 3, '2021-01-19 01:10:50'),
(2, 0, 5, '2021-01-19 01:12:35'),
(3, 0, 6, '2021-01-19 01:12:36'),
(4, 0, 5, '2021-01-19 01:12:37'),
(6, 3, 5, '2021-01-19 01:13:36'),
(7, 3, 6, '2021-01-19 01:13:37'),
(10, 3, 5, '2021-01-21 02:55:31'),
(14, 3, 3, '2021-01-21 23:19:15');

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table_orijinal`
--

CREATE TABLE `like_table_orijinal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `like_table_orijinal`
--

INSERT INTO `like_table_orijinal` (`id`, `user_id`, `todo_id`, `created_at`) VALUES
(3, 3, 3, '2021-01-21 23:39:06'),
(4, 3, 4, '2021-01-21 23:39:07'),
(5, 3, 2, '2021-01-21 23:39:08');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(1, 'ろくまる', 'f1576406b382b7d1c8c2607f7c563d4f'),
(2, '田中', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'okura', '76d80224611fc919a5d54f0ff9fba446'),
(4, '', ''),
(5, 'クリス', 'c8837b23ff8aaa8a2dde915473ce0991'),
(6, 'きさらぎ', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'きさらぎ', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, '', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `image`, `created_at`, `updated_at`) VALUES
(3, '買い物行くよ', '2020-12-21', NULL, '2020-12-19 17:40:51', '2020-12-19 17:40:51'),
(5, '関数', '2020-12-27', NULL, '2020-12-27 01:27:12', '2020-12-27 01:27:12'),
(6, 'test', '2021-01-20', NULL, '2021-01-18 22:40:04', '2021-01-18 22:40:04'),
(7, 'test', '2021-02-04', 'upload/20210204150404f96a5ff54583afb941249dffef171dc1.jpeg', '2021-02-04 23:04:04', '2021-02-04 23:04:04');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, '斎藤', '123456', 0, 0, '2021-01-07 22:49:27', '2021-01-07 22:49:27'),
(4, '田中', 'あああああ', 0, 0, '2021-01-07 22:49:35', '2021-01-07 22:49:35'),
(5, '鈴木', 'mokumoku', 0, 0, '2021-01-07 22:54:11', '2021-01-07 22:54:11'),
(6, 'saito', '12345', 0, 0, '2021-01-09 15:52:31', '2021-01-09 15:52:31'),
(7, 'takahashi', '123', 0, 0, '2021-01-09 16:17:03', '2021-01-09 16:17:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table_orijinal`
--

CREATE TABLE `users_table_orijinal` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table_orijinal`
--

INSERT INTO `users_table_orijinal` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '斎藤', '123456', 0, 0, '2021-01-09 23:27:51', '2021-01-09 23:27:51');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `diary_table`
--
ALTER TABLE `diary_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `file_db`
--
ALTER TABLE `file_db`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `file_path` (`file_path`);

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `like_table_orijinal`
--
ALTER TABLE `like_table_orijinal`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table_orijinal`
--
ALTER TABLE `users_table_orijinal`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `diary_table`
--
ALTER TABLE `diary_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `file_db`
--
ALTER TABLE `file_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- テーブルの AUTO_INCREMENT `like_table_orijinal`
--
ALTER TABLE `like_table_orijinal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `users_table_orijinal`
--
ALTER TABLE `users_table_orijinal`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
