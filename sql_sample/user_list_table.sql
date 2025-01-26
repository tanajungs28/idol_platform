-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3307
-- 生成日時: 2025-01-26 17:30:19
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `user_db_class`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_list_table`
--

CREATE TABLE `user_list_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_list_table`
--

INSERT INTO `user_list_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0),
(4, '田中純', 'tanaka', 'tanaka', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user_list_table`
--
ALTER TABLE `user_list_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `user_list_table`
--
ALTER TABLE `user_list_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
