<?php
session_start();
//funcs.phpに記載している共通関数を呼び出し
require_once('funcs.php');
loginCheck();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アイドルグループ登録</title>
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
            <div class="title">管理者メニュー　アイドルグループ登録</div>
        </div>
     </header>

     <main>
     <!-- 登録情報入力部 -->
     <form action="idol_insert.php" method="post" id = "profile_area" enctype="multipart/form-data">
        <input type="text" id = "group_name" name = "group_name" placeholder="アイドルグループ名">
        <input type="text" id = "official_site_url" name = "official_site_url" placeholder="オフィシャルサイトURL">
        <input type="text" id = "content" name = "content" placeholder="グループの紹介コメント">
        <div>
            <label for="group_image">画像：</label>
            <input type="file" name="group_image" id="group_image">
        </div>
        <div id = send_btn_area>
            <input type="submit" value= "送信">
        </div>
    </form>

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