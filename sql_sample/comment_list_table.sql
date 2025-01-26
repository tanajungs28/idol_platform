-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3307
-- 生成日時: 2025-01-26 17:29:41
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
-- テーブルの構造 `comment_list_table`
--

CREATE TABLE `comment_list_table` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_name_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `comment_list_table`
--

INSERT INTO `comment_list_table` (`id`, `group_id`, `group_name_id`, `user_id`, `comment`) VALUES
(1, 1, 0, 1, 'a'),
(2, 1, 0, 1, 'kawaii'),
(3, 1, 0, 1, 'テスト'),
(4, 1, 0, 1, 'テスト'),
(5, 0, 0, 1, 'あいうえお'),
(6, 0, 0, 1, 'あいうえお'),
(7, 0, 0, 1, 'あ'),
(8, 0, 0, 1, 'テスト'),
(9, 0, 0, 1, '手羽先センセーション最高'),
(10, 0, 0, 1, 'ああ'),
(11, 6, 0, 1, 'フルーツジッパー最高'),
(12, 5, 0, 1, '＝LOVE最高'),
(13, 7, 0, 1, 'ONE LOVE ONE HART最高'),
(14, 6, 0, 1, 'フルーツジッパー'),
(15, 6, 0, 1, 'あ'),
(16, 5, 0, 1, 'イコラブかわいい'),
(17, 5, 5, 1, '＝LOVE'),
(18, 6, 6, 1, 'ふるっぱー'),
(19, 6, 6, 1, 'あいうえお'),
(20, 6, 6, 1, 'あ'),
(21, 6, 6, 1, 'あ'),
(22, 6, 0, 1, 'あいうえお'),
(23, 6, 0, 1, 'あいうえお'),
(24, 6, 6, 1, 'あ'),
(25, 6, 6, 1, 'あ'),
(26, 15, 15, 1, 'スパガいいよね'),
(27, 5, 5, 1, 'a');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comment_list_table`
--
ALTER TABLE `comment_list_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comment_list_table`
--
ALTER TABLE `comment_list_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
