<?php 
//funcs.phpに記載している共通関数を呼び出し
require_once('funcs.php');

//1. POSTデータ取得
$tweet = $_POST['tweet'];

//2.  DB接続します
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

// 1. SQL文を用意
$stmt = $pdo->prepare(
                    "INSERT INTO 
                        timeline_table(
                            id, uname, tweet, time
                        ) 
                        VALUES(
                            NULL,:uname , :tweet, now()
                        );"
                      );

//  2. バインド変数を用意(セキュリティ対策で変数を1個かませる)
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':uname', "", PDO::PARAM_STR);
$stmt->bindValue(':tweet', $tweet, PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();


//４．データ登録処理後
if($status === false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
  }else{
    //５．profile_edit.phpへリダイレクト
    header('Location: index.php');
  
  }

?>