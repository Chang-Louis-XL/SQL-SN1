-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-16 03:53:40
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `school`
--

-- --------------------------------------------------------

--
-- 資料表結構 `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` tinyint(3) UNSIGNED NOT NULL,
  `no` tinyint(3) UNSIGNED NOT NULL,
  `tutor` varchar(32) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `classrooms`
--

INSERT INTO `classrooms` (`id`, `grade`, `no`, `tutor`, `location`) VALUES
(1, 1, 1, '王小明', 'A棟101'),
(2, 2, 2, '張三豐', 'A棟201'),
(3, 1, 2, '劉德華', 'A棟301'),
(4, 3, 2, '金太研', 'A棟501'),
(5, 2, 3, '李智恩', 'A棟501'),
(6, 1, 5, '李敏鎬', 'A棟301'),
(7, 2, 5, '金秀賢', 'A棟301');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
