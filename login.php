<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
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
            <div class="title">ログイン画面</div>
        </div>
     </header>

     <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
        <form name="form1" action="login_act.php" method="post">
            ID:<input type="text" name="lid" />
            PW:<input type="password" name="lpw" />
            <input type="submit" value="LOGIN" />
        </form>


        <footer>

</footer>

<!-- jquery指定 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
<script type="module" src="js/registration.js"></script>


</body>
</html>