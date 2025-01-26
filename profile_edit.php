<?php
session_start();
//funcs.phpに記載している共通関数を呼び出し
require_once('funcs.php');
loginCheck();

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
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
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
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

// 入力されたURL情報からYoutube IDを切り出す
preg_match('/v=([^&]+)/', h($result['url']), $matches);
$videoId = $matches[1];

// YouTube API Keyの指定(github上にAPI Keyは上げない)
$apiUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' . $videoId . '&part=snippet&key=';

// cURLの初期化
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL request
$response = curl_exec($ch);
curl_close($ch);

// Decode JSON response
$data = json_decode($response, true);

// Get the thumbnail URL
$thumbnailUrl = $data['items'][0]['snippet']['thumbnails']['high']['url'];


    $view .= '<div id = "prcard">';
    $view .= '<p id = "reg_date">登録日：';
    $view .= $result['date'];
    $view .= '</p>';
    $view .= '<p id = "group_name">';
    $view .= h($result['name']);
    $view .= '</p>';
    $view .= '<img id = "thumbnail" src="' . $thumbnailUrl . '" alt="YouTube Thumbnail">';
    $view .= '<a id = tubelink href = "';
    $view .= h($result['url']);
    $view .= '">Youtubeリンク</a>';
    $view .= '<p id = "comment_area">';
    $view .= h($result['comment']);
    $view .= '</p>';
    $view .= '</div>';
  }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プロフィール設定</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_profile.css">
</head>

<body>
        <!-- ヘッダー情報 -->
        <header>
     <button id = "back_btn">
        <img src="pic/back.png" alt="" id = "btn_pic">
     </button>
     <div class="title_area">
            <div class="title">推し曲登録</div>
        </div>
     </header>

     <main>
     <!-- プロフィール入力部 -->
     <form action="profile_insert.php" method="post" id = "profile_area">
        <input type="text" id = "name" name = "name" placeholder="好きなアイドルグループ">
        <input type="text" id = "url" name = "url" placeholder="あなたの推し曲のYoutube URL">
        <input type="text" id = "comment" name = "comment" placeholder="どんなところが良い？">
        <div id = send_btn_area>
            <input type="submit" value= "送信">
        </div>
    </form>


    <div>
      <div class="profile_card_area"><?= $view ?></div>
    </div>

     </main>


     <footer>

     </footer>

    <!-- jquery指定 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
    <script type="module" src="js/registration.js"></script>
    
    

</body>
</html>