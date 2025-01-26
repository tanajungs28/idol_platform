<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_list.css">
</head>
<body>
    <header>
    <button id = "back_btn">
        <img src="pic/back.png" alt="" id = "btn_pic">
     </button>
    <div class="title_area">
            <div class="title">ユーザー一覧</div>
        </div>
    </header>

    <main>
        <div id = user_list>
        <?php
            $data = file_get_contents('data/data.txt');
            echo nl2br($data);
        ?>
        </div>

    <!-- 戻るボタンの実装 -->
        <div id = btn_area>
            <button id = "back_btn">メインメニューに戻る</button>
        </div>

    </main>


    <!-- jquery指定 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
    <script type="module" src="js/registration.js"></script>
    
    
</body>
</html>