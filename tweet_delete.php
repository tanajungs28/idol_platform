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


//３．データ削除SQL作成
//この時にソフトデリートの仕掛けを入れておいてもいいね（表示は消すけどデータベース上は消さないみたいな）
$stmt = $pdo->prepare('DELETE FROM timeline_table WHERE id = :id');

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
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
?>