<?php 
        // 0. SESSION開始！！
        session_start();
        //データベース接続
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
        
        //２．データ登録SQL作成
        $stmt = $pdo->prepare('SELECT * FROM timeline_table');
        $status = $stmt->execute();        

        //３．データ表示
        $view = '';
        $tweets = [];
        $ids = [];
        if ($status === false) {
            $error = $stmt->errorInfo();
            exit('SQLError:' . print_r($error, true));
        } else {
            //1行ずつデータベースから結果を取り出して配列に格納($resultは連想配列)
            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tweets[] = $result['tweet'] ;
                $ids[] = $result['id'] ;
            }
        }        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNS風味にしたいアプリ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style_index.css">
    <link rel="stylesheet" href="css/style_timeline.css">
</head>


<body>
    <!-- ヘッダー -->
    <header>
        <div class="title_area">
            <div class="title">SNS風味にしたいアプリ</div>
        </div>
        <!-- ハンバーガーメニュー -->
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="navicon"></span>
        </label>
            <ul class="menu">
                <li class="top"><a href="./user_reg.php">ユーザー登録</a></li>
                <li><a href="./user_list.php">ユーザー一覧</a></li>
                <li><a href="./profile_edit.php">推し曲登録</a></li>
                <li><a href="./login.php">ログイン</a></li>
                <li><a href="./logout.php">ログアウト</a></li>
                <li><a href="./idol_list.php">アイドルグループ一覧</a></li>
                <li><a href="./idol_reg.php">アイドルグループ登録</a></li>
            </ul>
    </header>
    
    <main>

    <!-- タイムライン -->
     <!-- ツイート入力部 -->
     <form action="tweet_insert.php" method="post" id = "tweet_area">
        <input type="text" id = "tweet" name = "tweet" placeholder="いまどうしてる？">
        <div id = send_btn_area>
            <input type="submit" value= "送信">
        </div>
    </form>

    <!-- タイムラインを表示 -->
    <div id="timeline">
   <!-- $tweetsが空でないときに実行 -->
   <?php if (!empty($tweets)): ?>
        <!-- 配列の要素を1個ずつ取り出し、要素（$tweet）に代入して処理を繰り返す -->
         <!-- array_revers関数を使用して新しい順に表示させる -->
       <?php $ids = array_reverse($ids); ?>
        <?php foreach (array_reverse($tweets) as $key => $tweet): ?>
            <div class="tweet-card">
            <!-- ミートボールの表示 -->
           <?php if(isset($_SESSION['kanri_flg']) && ($_SESSION['kanri_flg'] === 1)): ?>

            <button class="meatball">
                    <span class="meatball-ball"></span>
                    <span class="meatball-ball"></span>
                    <span class="meatball-ball"></span>
            </button>
                <!-- ミートボール押したときの表示メニュー -->
                <div class="menu-container">
                    <div class="submenu">
                <?php var_dump($ids[$key]);?>
                        <ul>
                            <li><a href="tweet_delete.php?id=<?php echo $ids[$key] ?>">削除</a></li>
                            <li><a href="tweet_edit.php?id=<?php echo $ids[$key] ?>">編集</a></li>
                            <li><a href="#">未実装</a></li>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
            <?php endif; ?>
                <!-- 入力したテキストと時間を表示 -->
                <p class="tweet-content"><?php echo $tweet; ?></p>
                <span class="tweet-time"><?php echo date('Y-m-d H:i:s'); ?></span>
                
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>まだツイートがありません。</p>
    <?php endif; ?>

    </div>



    </main>


    
    <!-- jquery指定 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jsファイル指定、importを使用するためにはscript指定時に「type="module"」を入れないと動かない -->
    <script type="module" src="js/registration.js"></script>


</body>
</html>