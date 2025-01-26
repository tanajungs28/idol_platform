-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3307
-- 生成日時: 2025-01-26 17:30:05
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
-- テーブルの構造 `idol_list_table`
--

CREATE TABLE `idol_list_table` (
  `id` int(12) NOT NULL,
  `group_name` varchar(256) NOT NULL,
  `group_image` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text DEFAULT NULL,
  `official_site_url` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `idol_list_table`
--

INSERT INTO `idol_list_table` (`id`, `group_name`, `group_image`, `content`, `official_site_url`) VALUES
(5, '=LOVE', 'img/678fc1de1dd75.jpg', '指原さんプロデュースのアイドルグループ第一号', 'https://equal-love.jp/'),
(6, 'FRUITS ZIPPER', 'img/678fc3319c2aa.jpg', 'アソビシステムのアイドルプロジェクト「KAWAII LAB.」より2022年デビュー。 「原宿から世界へ」をコンセプトに、多様なカルチャーの発信地、個性の集まるファッションの街“原宿”から「NEW KAWAII」を発信していく。 2023年、日本レコード大賞 最優秀新人賞を受賞。 2024年5月には2周年を記念したワンマンライブを日本武道館にて2Days開催する。', 'https://fruitszipper.asobisystem.com/'),
(7, 'ONE LOVE ONE HEART', 'img/678fc3892e484.jpg', '2022年1月結成の男女混合9人組。スターダストプロモーションとavexの合同プロジェクトとしてスタートし、歌・ダンス・芝居などあらゆるジャンルでの活躍を目指す、青春代演エンタテインメントグループ。グループ名の \"ONE LOVE ONE HEART\"には、「人種・性別・年齢・価値観が違っても、誰かや何かを愛する心は共通している」という意味が込められている。', 'https://oneloveoneheart.jp/'),
(8, '手羽先センセーション', 'img/678fc4023e9a0.jpg', 'グループ名に反して意外と王道！キャッチーな楽曲と情熱的なパフォーマンスで心を掴みメジャーデビュー。名古屋を代表するグループとして急成長！ TOKYO DOME CITY HALLや日比谷野外大音楽堂でのワンマンライブを成功させ、2024年4月からは新体制での第三章がスタート！ 名古屋から全国へ、新たなセンセーションを起こす！', 'https://tebasen.com/'),
(9, 'HKT48', 'img/6795b75189d26.jpg', 'AKB48グループ第4弾として2011年に福岡に発足したHKT48は2013年3月20日、デビューシングル「スキ！スキ！スキップ！」でCDデビューし、昨年12月には最新シングル「バケツを被れ！」をリリース。今年5月に新しく第7期生16名が加入。福岡PayPayドーム隣、BOSS E･ZO FUKUOKA 1Fの常設劇場にて連日公演を開催しています。', 'https://www.hkt48.jp/'),
(11, '衛星とカラテア', 'img/6795b808195e9.jpg', '「何気ない日常の、小さな幸せを大切に。そしたらきっとーー」を掲げ、結成当初から “ 聴き手の日常に寄り添う ” 世界観を独自性としている。 TikTok・YouTubeなどSNSコンテンツにも力を入れており、総フォロワー数は109万人越え！アイドルファンのみならず、幅広い層の“日常”に浸透中。', 'https://starray-p.com/artist/eiseito_karatea'),
(12, 'CANDY TUNE', 'img/6795b862b8d52.jpg', 'アソビシステムが手掛けるプロジェクト「KAWAII LAB.」より2023年3月14日にデビュー。 グループ名には、フレーバーも形もさまざまな「CANDY」のように、好きなものも性格も違う個性豊かなメンバーが集まり彼女たちのポップな「TUNE（旋律）」を奏でていって欲しいという想いが込められている。 4月27日には豊洲PITにて1st ANNIVERSARY TOUR 2024を開催予定。', 'https://kawaiilab.asobisystem.com/'),
(13, 'CUTIE STREET', 'img/6795b8a724ef8.jpg', 'アソビシステムのアイドルプロジェクト「KAWAII LAB.」より2024年夏デビュー。 グループのコンセプトは“KAWAII MAKER”。年齢も経歴も異なる8人のメンバーが“KAWAII MAKER”として、彼女たちの生み出した“KAWAII”を原宿から世界へ発信していく。', 'https://kawaiilab.asobisystem.com/'),
(14, '私立恵比寿中学', 'img/6795b8f91eada.jpg', 'スターダストプロモーション所属の10人組アイドルグループ。通称：えびちゅう。活動コンセプトは「永遠に中学生」。', 'https://www.shiritsuebichu.jp/official/pc/'),
(15, 'SUPER☆GiRLS', 'img/6795b95751e6e.jpg', '2010年にエイベックス初の大規模なアイドルオーディション「avexアイドルオーディション2010」で7,000名から選ばれた12名でSUPER☆GiRLSが誕生。 昨年1月29日には6期メンバー5名が加入し、今年からは7代目リーダーに竹内ななみ、ステージリーダーに門林有羽が着任。 最高にアツいライブをお届けしますので、ぜひ一緒に楽しい時間にしましょう！', 'https://supergirls.jp/'),
(16, 'タイトル未定', 'img/6795b988c9f4a.jpg', '2020年5月16日デビュー。 北海道札幌市を拠点に活動する、女性アイドルグループ「タイトル未定」 コンセプトは「何者かになろうとしなくていい。何者でもない今を大切に。」まだ定まっていない、足りない、未完成であるということを表現している。20歳前後の将来に対しての、何者にならなくてはいけないという不安になる気持ちの葛藤。また何者にでもなれるという希望を込めてこのグループ名が付けられた。', 'https://miteititle.com/'),
(17, 'Task have Fun', 'img/6795b9beea33e.jpg', '人生は課題（Task）だらけ、だったらそんなTaskを楽しみながらクリアしちゃおう！がコンセプトのアイドルユニット。容姿からは想像のつかないパワフルなパフォーマンスで観客を魅了するライブが話題となっている。 2022年11月8日発売 2nd アルバム「Violet tears」がBillboardウィークリーチャート10位獲得 本年5月より全4都市を周る結成8周年『全力全開ツアー』を開催', 'https://taskhavefun.net/'),
(18, '虹のコンキスタドール', 'img/6795ba14e98b7.jpg', '自分たちが思う「かわいい！」や「好き！」を追い求めるインドア系・正統派アイドルグループ。通称“虹コン”。 自称アイドル界イチ夏曲の多さを誇るも、実は直射日光が苦手な室内派……でも本当はやればできる子。 虹コンなりのアツいライブでみんなの心を征服ちゅう！', 'https://2zicon.tokyo/'),
(19, '真っ白なキャンバス', 'img/6795ba7ce6675.jpg', '7人組アイドルグループ『真っ白なキャンバス』 2017年9月結成。2020年3月にキングレコードよりメジャーデビュー。『あなたと一緒に、大きな夢を描いていきたい。この真っ白なキャンバスに。』をコンセプトに活動中。', 'https://shirokyan.com/'),
(20, 'わーすた', 'img/6795babd89731.jpg', '2015年に結成のデジタルネイティブ世代アイドル。 グループ名は「The World Standard」の略。 現在まで、12か国の国でライブ出演するなど世界に照準を合わせ活動している。アニメ「アイドルタイムプリパラ」「キラッとプリ☆チャン」など多数のアニメの楽曲を担当。', 'https://wa-suta.world/'),
(21, 'Onephony', 'img/6795bb13f209a.jpg', '深瀬美桜プロデュース6人組グループ。 初の三大都市ツアーを開催中で初日大阪公演を発売6時間でSOLDOUT。 まさに旋風を巻き起こしている。 楽曲・衣装はジャンルにとらわれない発信をし、 さらに唯一無二のルックスの高さも人気の大きな要因となっている。 フレッシュなキューピットたちがお台場をヒートアップさせる! この夏、大注目のOnephony!!', 'https://lit.link/Onephony');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `idol_list_table`
--
ALTER TABLE `idol_list_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `idol_list_table`
--
ALTER TABLE `idol_list_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
