<?php
//funcs.phpに記載している共通関数を呼び出し
require_once('funcs.php');

//1. POSTデータ取得
$group_name = $_POST['group_name'];
$content = $_POST['content'];
$official_site_url = $_POST['official_site_url'];

// 画像アップロードの処理
$group_image = '';
if(isset($_FILES['group_image'])){
    //アップロードする画像をリネームする準備
    $upload_file = $_FILES['group_image']['tmp_name'];
    $extension = pathinfo($_FILES['group_image']['name'], PATHINFO_EXTENSION);
    $new_name = uniqid() . '.' . $extension; //余裕があれば拡張子が画像ファイル向けの拡張子になっているかの確認を入れたほうが〇

    //image_pathを確認
    $image_path = 'img/' . $new_name;

      // move_uploaded_file()で、一時的に保管されているファイルをimage_pathに移動させる。
    if (move_uploaded_file($upload_file, $image_path)) {
        $group_image = $image_path;
    }
}else{
    echo "画像が入ってません";
    exit;
}




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
$stmt = $pdo->prepare("INSERT INTO 
                        idol_list_table(id, group_name, group_image, content, official_site_url) 
                        VALUES(NULL, :group_name, :group_image, :content, :official_site_url)"
                      );

//  2. バインド変数を用意(セキュリティ対策で変数を1個かませる)
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':group_name', $group_name, PDO::PARAM_STR);
$stmt->bindValue(':group_image', $group_image, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':official_site_url', $official_site_url, PDO::PARAM_STR);

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



