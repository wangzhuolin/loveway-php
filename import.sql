-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-02-18 21:50:01
-- 服务器版本： 5.7.33-log
-- PHP 版本： 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `loveway`
--

-- --------------------------------------------------------

--
-- 表的结构 `loveway_config`
--

CREATE TABLE `loveway_config` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `loveway_config`
--

INSERT INTO `loveway_config` (`id`, `name`, `value`) VALUES
(216039, 'title', '未知表白墙'),
(345445, 'about', '关于本站'),
(393564, 'about_content', '欢迎来到由吴先森开发的表白墙！<br />本站使用MDUI开发<br />'),
(572965, 'submit', '去表白'),
(578760, 'keywords', '未知表白墙'),
(782431, 'description', '未知表白墙'),
(878767, 'audio', 'https://static.llilii.cn/music/キミペディア.mp3');

-- --------------------------------------------------------

--
-- 表的结构 `loveway_data`
--

CREATE TABLE `loveway_data` (
  `id` int(11) NOT NULL,
  `confessor` text NOT NULL,
  `contact` text NOT NULL,
  `time` text NOT NULL,
  `to_who` text NOT NULL,
  `introduction` text NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `loveway_config`
--
ALTER TABLE `loveway_config`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `loveway_data`
--
ALTER TABLE `loveway_data`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
