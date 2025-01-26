<?php

    //funcs.phpに記載している共通関数を呼び出し
    require_once('funcs.php');

    //1. POSTデータ取得
    $name = $_POST['uname'];
    $lid = $_POST['lid'];
    $lpw = $_POST['lpw'];
    // $gender = $_POST['gender'];

    //2.  DB接続します
    // $pdo = localdb_conn(); //ローカル環境

    $db_name = '';       //データベース名(ユーザ名)
    $db_host = '';   //DBホスト
    $db_id = '';         //ユーザ名
    $db_pw = '';                      //パスワード


    try {
        // ID:'root', Password: xamppは 空白 '',SQLのポート番号の指定も必要
        $server_info = 'mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host;
        $pdo = new PDO($server_info, $db_id, $db_pw);
      } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit('DBConnectError:'.$e->getMessage());
      }
      

    //３．データ登録SQL作成

    // 1. SQL文を用意
    $stmt = $pdo->prepare("INSERT INTO 
                            user_list_table(id, name, lid, lpw, kanri_flg, life_flg) 
                            VALUES(NULL, :name, :lid, :lpw, 0, 0)"
                        );

    //  2. バインド変数を用意(セキュリティ対策で変数を1個かませる)
    // Integer 数値の場合 PDO::PARAM_INT
    // String文字列の場合 PDO::PARAM_STR

    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);

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







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <!-- お名前：<?= $uname ?> -->
   <!-- EMAIL：<?= $email ?> -->

   
    <h1>登録完了</h1>

   <!-- 戻るボタンの実装 -->
     <div>
        <button id = "back_btn">戻る</button>
    </div>




    <!-- jquery指定 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
    <script type="module" src="js/registration.js"></script>

</body>
</html>