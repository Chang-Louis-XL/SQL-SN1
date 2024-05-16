-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-05-13 08:22:18
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
-- 資料表結構 `records`
--
/* 
CREATE TABLE  `records` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `note` text DEFAULT NULL,
  `price` int(10) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `payer` text NOT NULL,
  `place` text NOT NULL,
  `payment` text NOT NULL,
  `dollar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
 */
--
-- 傾印資料表的資料 `records`
--

INSERT INTO `records` (`id`, `date`, `note`, `price`, `type`, `category`, `payer`, `place`, `payment`, `dollar`) VALUES
(null, '2024-05-13', '麥當勞', 150, '支出', '早餐', 'mack', '泰山', '現金', '新台幣'),
(null, '2024-05-14', '義尤味勁', 155, '支出', '午餐', 'mack', '泰山', '現金', '新台幣'),
(null, '2024-05-15', '天賜良緣', 20000, '支出', '宴客', 'mack', '泰山', '信用卡', '新台幣'),
(null, '2024-05-17', '', 5000, '支出', '電話費', 'john', '泰山', 'Linepay', '新台幣'),
(null, '2024-05-13', '', 15000, '支出', '房租', 'john', '泰山', '信用卡', '新台幣'),
(null, '2024-05-14', '蛋餅+大冰奶', 65, '支出', '早餐', 'mack', '泰山', 'applepay', '新台幣'),
(null, '2024-05-15', '麥當勞', 120, '支出', '午餐', 'mack', '新莊', '信用卡', '新台幣'),
(null, '2024-05-16', '', 2500, '支出', '水電費', 'mary', '新莊', '現金', '新台幣'),
(null, '2024-05-17', '', 360, '支出', 'Netflix', 'devin', '新莊', '現金', '新台幣'),
(null, '2024-05-12', '襯衫', 2600, '支出', '衣服', 'mack', '新莊', '現金', '新台幣'),
(null, '2024-05-12', '珍珠奶茶', 50, '支出', '飲料', 'mack', '新莊', '現金', '新台幣');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `records`
--
/* ALTER TABLE `records`
  ADD PRIMARY KEY (`id`); */

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `records`
--
/* ALTER TABLE `records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12; */
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
