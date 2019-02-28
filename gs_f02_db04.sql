-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019 年 2 朁E28 日 13:07
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_f02_db04`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`) VALUES
(18, 'アミカス図書室aaa', '福岡市', '', '2019-02-07 22:31:45'),
(19, '中央図書館', '福岡県福岡市中央区赤坂', '', '2019-02-07 23:25:31'),
(20, 'アミカス図書室', '福岡市', '', '2019-02-14 15:20:42'),
(21, 'アミカス図書室', '福岡市', 'asdfghjkl;', '2019-02-16 14:04:34');

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE IF NOT EXISTS `php02_table` (
`id` int(12) NOT NULL,
  `task` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `indate`) VALUES
(3, '課題3aaaaaaaｄｄｄｄ', '2019-02-28', '楽しいaaaaaaｓｓｓｓｓ', '2019-02-02 15:28:15'),
(6, '課題5', '2019-02-10', '普通', '2019-02-02 15:29:22'),
(7, '課題6', '2019-02-11', '普通', '2019-02-02 15:29:41'),
(8, '課題7', '2019-02-14', '普通', '2019-02-02 15:30:00'),
(9, '課題8', '2019-02-15', '普通', '2019-02-02 15:30:18'),
(10, '課題9', '2019-02-16', '普通', '2019-02-02 15:30:33'),
(11, '課題10', '2019-02-19', '普通', '2019-02-02 15:30:53'),
(12, '', '2019-12-31', 'ｌｌｌ', '2019-02-02 16:30:21'),
(13, '', '2019-12-31', 'just', '2019-02-02 17:00:05'),
(14, '', '0000-00-00', '地域が分かる！', '2019-02-02 17:59:12'),
(15, '', '0000-00-00', '地域がわかる', '2019-02-02 17:59:27'),
(16, '', '0000-00-00', 'おもろい', '2019-02-02 18:00:18'),
(17, '', '0000-00-00', 'おもろい', '2019-02-02 18:01:31'),
(18, '', '2019-02-01', 'deadline\r\n', '2019-02-09 19:03:27'),
(19, '', '2019-12-31', 'deficult\r\n', '2019-02-09 20:32:23'),
(20, '', '2018-11-30', 'にしむくさむらい', '2019-02-09 20:37:52'),
(21, '', '2019-12-31', 'あああ', '2019-02-09 20:39:10'),
(22, '', '2019-12-31', 'あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ', '2019-02-09 20:41:31'),
(23, 'hhh', '2019-02-10', 'ooooooo', '2019-02-09 20:49:16');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`, `indate`) VALUES
(4, 'toudou', 'ttt', 'ttt', 0, 0, '2019-02-14 13:51:28'),
(5, 'ruru', 'ruru', 'rrr', 1, 0, '2019-02-14 14:45:10'),
(6, 'turu', 'turu', 'ttt', 0, 0, '2019-02-14 14:46:12'),
(7, 'qaqa', 'qaqa', 'qq', 1, 0, '2019-02-14 14:47:11'),
(8, 'saga', 'saga', 'saga', 0, 0, '2019-02-14 14:48:22'),
(9, 'ソトコト', 'aaaa', 'aaa', 0, 0, '2019-02-14 14:50:23'),
(10, 'ソトコト', 'aaa', '1111', 1, 0, '2019-02-14 14:54:27'),
(11, 'www', 'www', 'www', 0, 1, '2019-02-28 17:48:09'),
(12, 'www', 'www', 'www', 1, 0, '2019-02-28 17:49:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
