-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-16 04:26:11
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
-- 資料庫： `journal`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dollars`
--

CREATE TABLE `dollars` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `abbr` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `dollars`
--

INSERT INTO `dollars` (`id`, `name`, `abbr`) VALUES
(1, '新台幣', 'NTD'),
(2, '美元', 'USD');

-- --------------------------------------------------------

--
-- 資料表結構 `payments`
--

CREATE TABLE `payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL,
  `account` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `payments`
--

INSERT INTO `payments` (`id`, `name`, `account`) VALUES
(1, '現金', '郵局'),
(2, 'LinePay', '玉山銀行'),
(3, '信用卡', '國泰銀行');

-- --------------------------------------------------------

--
-- 資料表結構 `place`
--

CREATE TABLE `place` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `place`
--

INSERT INTO `place` (`id`, `name`) VALUES
(1, '泰山'),
(2, '新莊'),
(3, '台北');

-- --------------------------------------------------------

--
-- 資料表結構 `records`
--

CREATE TABLE `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `price` int(10) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `payer` text NOT NULL,
  `place` text NOT NULL,
  `payment` text NOT NULL,
  `dollar_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `records`
--

INSERT INTO `records` (`id`, `date`, `note`, `price`, `type`, `category`, `payer`, `place`, `payment`, `dollar_id`) VALUES
(1, '2024-05-13', '麥當勞', 150, '支出', '早餐', 'mack', '1', '1', 1),
(2, '2024-05-14', '義尤味勁', 155, '支出', '午餐', 'mack', '1', '1', 1),
(3, '2024-05-15', '天賜良緣', 20000, '支出', '宴客', 'mack', '1', '3', 1),
(4, '2024-05-17', '', 5000, '支出', '電話費', 'john', '1', '2', 1),
(5, '2024-05-13', '', 15000, '支出', '房租', 'john', '1', '3', 1),
(6, '2024-05-14', '蛋餅+大冰奶', 65, '支出', '早餐', 'mack', '2', '2', 1),
(7, '2024-05-15', '麥當勞', 120, '支出', '午餐', 'mack', '2', '3', 1),
(8, '2024-05-16', '', 2500, '支出', '水電費', 'mary', '2', '1', 1),
(9, '2024-05-17', '', 360, '支出', 'Netflix', 'devin', '2', '1', 1),
(10, '2024-05-12', '襯衫', 2600, '支出', '衣服', 'mack', '2', '1', 1),
(11, '2024-05-12', '珍珠奶茶', 50, '支出', '飲料', 'mack', '2', '1', 1),
(12, '2024-05-13', '麥當勞', 150, '支出', '早餐', 'mack', '1', '1', 1),
(13, '2024-05-14', '義尤味勁', 155, '支出', '午餐', 'mack', '1', '1', 1),
(14, '2024-05-15', '天賜良緣', 20000, '支出', '宴客', 'mack', '1', '3', 1),
(15, '2024-05-17', '', 5000, '支出', '電話費', 'john', '1', '2', 1),
(16, '2024-05-13', '', 15000, '支出', '房租', 'john', '1', '3', 1),
(17, '2024-05-14', '蛋餅+大冰奶', 65, '支出', '早餐', 'mack', '1', '2', 1),
(18, '2024-05-15', '麥當勞', 120, '支出', '午餐', 'mack', '2', '3', 1),
(19, '2024-05-16', '', 2500, '支出', '水電費', 'mary', '2', '1', 1),
(20, '2024-05-17', '', 360, '支出', 'Netflix', 'devin', '2', '1', 1),
(21, '2024-05-12', '襯衫', 2600, '支出', '衣服', 'mack', '2', '1', 1),
(22, '2024-05-12', '珍珠奶茶', 50, '支出', '飲料', 'mack', '2', '1', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dollars`
--
ALTER TABLE `dollars`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dollars`
--
ALTER TABLE `dollars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `records`
--
ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
