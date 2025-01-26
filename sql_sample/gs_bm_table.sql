-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql3104.db.sakura.ne.jp
-- 生成日時: 2024 年 12 月 19 日 02:47
-- サーバのバージョン： 8.0.40
-- PHP のバージョン: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tanajun_user_db_class`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `date`) VALUES
(2, 'ONE LOVE ONE HEART', 'https://www.youtube.com/watch?v=qD1_JMF7zLs&list=RD0ZMkrQbkvK4&index=31', 'じわじわ来ているスターダスト×avexの男女混合グループ！歌いだしからボーカル藤咲さんの歌声にはまります！', '2024-12-19 02:10:19'),
(3, 'Buono!', 'https://www.youtube.com/watch?v=ow-oAf3tfPg&list=RD0ZMkrQbkvK4&index=6', '歴代アイドルソングの中でも最高傑作のうちの一つ。今はもう見れないももちの歌が素敵！', '2024-12-19 02:12:15'),
(5, '超ときめき♡宣伝部', 'https://www.youtube.com/watch?v=a2UIokBmSno', 'TikTokで1億再生以上の大バズり！スターダストの苦労人グループがここにきて世間に見つかったのは喜びだし、歌はみんなが口ずさみやすくてよき', '2024-12-19 02:20:08'),
(6, 'FRUITS ZIPPER', 'https://www.youtube.com/watch?v=85fZZIEEDUQ', 'アイドル業界希望の光。時代はもうニュー可愛いなのです、誰がなんといおうとニュー可愛いなのです。', '2024-12-19 02:24:13'),
(7, '=LOVE', 'https://www.youtube.com/watch?v=0ZMkrQbkvK4&list=RDOJ6JJDO6Qks&index=3', '指原先生プロデュースのアイドルグループ。こちらもTikTokでバスり気味。ほんと絶対アイドル辞めないでほしい。みんな辞めないで。。。', '2024-12-19 02:28:52'),
(8, '私立恵比寿中学', 'https://www.youtube.com/watch?v=qSA2Lu7E9hI', '社会人になってからツアーで沖縄遠征をするくらいはまっていたエビ中。今は人数も増やして活動していますが、この曲はひなたのボーカルがとても気持ちの良い曲！', '2024-12-19 02:35:42');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
