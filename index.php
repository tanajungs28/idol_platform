<?php
session_start();
//funcs.phpに記載している共通関数を呼び出し
require_once('funcs.php');

//データベース接続
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


//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM idol_list_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status === false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  //$stmt->fetch(PDO::FETCH_ASSOC)でデータベースの中身を全て取り出す
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    $view .= '<div id = "prcard">';
    // $view .= '<a href="./comment_list.php">';    
    $view .= '<a href="./comment_list.php?group_id=' . h($result['id']) . '">'; // グループIDをリンクに含める
    $view .= '<p id = "group_name">';
    $view .= h($result['group_name']);
    $view .= '</p>';
    $view .= '<img src="' . $result['group_image'] .'" id = group_image>';
    $view .= '<a id = tubelink href = "';
    $view .= h($result['official_site_url']);
    $view .= '" target="_blank">OFFICIAL SITE</a>';
    // $view .= '<p id = "comment_area">';
    // $view .= h($result['content']);
    // $view .= '</p>';
    $view .= '</a>';
    $view .= '</div>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アイドル一覧</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_index.css">
    <!-- <link rel="stylesheet" href="css/style_profile.css"> -->
</head>

<body>
        <!-- ヘッダー情報 -->
    <!-- ヘッダー -->
    <header>
        <div class="title_area">
            <div class="title">アイドル口コミプラットフォーム</div>
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
                <li><a href="./login.php">ログイン</a></li>
                <li><a href="./logout.php">ログアウト</a></li>
                <li><a href="./index.php">アイドルグループ一覧</a></li>
                <li><a href="./idol_reg.php">アイドルグループ登録</a></li>
            </ul>
    </header>

     <main>

    <div class="introduction">
      <h1>ABOUT</h1>
      <div>アイドル口コミプラットフォームは、～自分の推しが誰かの推しに～をコンセプトに</div>
      <div>あなたの好きなアイドルの魅力を投稿してもらうことで、誰かの推し増しにつながるセカイを目指しています。</div>
      <div>是非みなさんの好きなアイドルグループの口コミを投稿して推しのグループを盛り上げていきましょう！</div>
    </div>

    <!-- 表示部分 -->
     <div>
      <div class="profile_card_area"><?= $view ?></div>
    </div>

     </main>

    <!-- フッター情報 -->
    <footer>
      <div class="footer_title">アイドル口コミプラットフォーム</div>
      <div class="footer_menu">
        <a class=footerlink href="./user_reg.php">ユーザー登録</a>
        <a class=footerlink href="./user_list.php">ユーザー一覧</a>
        <a class=footerlink href="./profile_edit.php">推し曲登録</a>
        <a class=footerlink href="./login.php">ログイン</a>
        <a class=footerlink href="./logout.php">ログアウト</a>
        <a class=footerlink href="./index.php">アイドルグループ一覧</a>
        <a class=footerlink href="./idol_reg.php">アイドルグループ登録</a>
      </div>

     </footer>

    <!-- jquery指定 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
    <script type="module" src="js/registration.js"></script>
    
     

</body>
</html>