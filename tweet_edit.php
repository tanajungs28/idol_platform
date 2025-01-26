<?php

//1. POSTデータ取得(URLで送られてくる場合はGETを使う)
$id      = $_GET['id'];
//2. DB接続します
require_once('funcs.php');
// $pdo = localdb_conn(); //ローカル環境
// $pdo = db_conn();         //本番環境

$db_name = '';       //データベース名(ユーザ名)
$db_host = '';   //DBホスト
$db_id = '';         //ユーザ名
$db_pw = '';                      //パスワード
  
try {
  // ID:'root', Password: xamppは 空白 '',SQLのポート番号の指定も必要
  $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
  $pdo = new PDO($server_info, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
//この時にソフトデリートの仕掛けを入れておいてもいいね（表示は消すけどデータベース上は消さないみたいな）
$stmt = $pdo->prepare('SELECT * FROM timeline_table WHERE id = :id;');

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNS風味にしたいアプリ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/style_timeline.css">
</head>


<body>
    <!-- ヘッダー -->
    <header>
        <div class="title_area">
            <div class="title">SNS風味にしたいアプリ</div>
        </div>
        <!-- ハンバーガーメニュー -->
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="navicon"></span>
        </label>
            <ul class="menu">
                <li class="top"><a href="./user_reg.php">ユーザー登録</a></li>
                <li><a href="./user_list.php">ユーザー一覧</a></li>
                <li><a href="./profile_edit.php">推し曲登録</a></li>
                <li><a href="">未実装</a></li>
            </ul>
    </header>
    
    <main>
    <!-- タイムライン -->
     <!-- ツイート入力部 -->
     <form action="tweet_update.php" method="post" id = "tweet_area">
        <input type="text" id = "tweet" name = "tweet" value = "<?= $result['tweet'] ?>">
        <input type="hidden" name="id"  value = "<?= $result['id'] ?>"> <!-- id情報は書き換えてほしくないのでtype=hiddenで隠す -->
        <div id = send_btn_area>
            <input type="submit" value= "送信">
        </div>
    </form>

    </main>

</body>
