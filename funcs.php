<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）

//htmlspecialchars($stg, ENT_QUOTES)を簡単に書くために関数作成
function h($stg){
    return htmlspecialchars($stg, ENT_QUOTES);
  }


//ローカル上でdbにアクセスする関数
function localdb_conn()
{
    try {
      $db_name = 'user_db_class'; //データベース名
      $db_id   = 'root'; //アカウント名
      $db_pw   = ''; //パスワード：MAMPは'root'
      $db_host = 'localhost'; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';port=3307;charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;    //$pdoを外で使うためにreturnを記載する
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}


//本番環境でdbにアクセスする関数
function db_conn()
{
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
}

// ログインチェク処理 loginCheck()
function loginCheck(){
  if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){
      //ログインを経由してない場合
      exit('LOGIN ERROR');
      }
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
}

