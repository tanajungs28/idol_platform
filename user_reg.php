<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_reg.css">
</head>
<body>
    <!-- ヘッダー情報 -->
     <header>
     <button id = "back_btn">
        <img src="pic/back.png" alt="" id = "btn_pic">
     </button>
     <div class="title_area">
            <div class="title">ユーザー登録画面</div>
        </div>
     </header>
    <!-- 登録情報の入力 -->
     <main>
     <form action="user_reg_post.php" method="post">
        <div id = "uname_area">
            <h2>名前</h2>
            <input type="text" id = "uname" name = "uname" placeholder="名前を入力してください">    
        </div>
        <div id = "email_area">
            <h2>ユーザーID（ログインの際に使用します）</h2>
            <input type="text" id = "email" name = "lid" placeholder="メールアドレスを入力してください">    
        </div>
        <div id = "password_area">
            <h2>パスワード</h2>
            <input type="text" id = "password" name = "lpw" placeholder="パスワードを入力してください">    
        </div>

        <div id = "gender_area">
            <h2>性別</h2>
            <select name="gender" id="">
                <option value="男性">男性</option>
                <option value="女性">女性</option>
            </select>
        </div>
        <div>
            <input type="submit" value= "送信" id = "send_btn">
        </div>
     </form>

     </main>




    <!-- jquery指定 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
    <script type="module" src="js/registration.js"></script>
    
</body>
</html>