<?php

//session start
session_start();
var_dump($_SESSION["kanri_flg"]);

// 関数ファイルの読み込み
include('functions.php');

//ログイン状態のチェック
chk_ssid();

$menu= menu($_SESSION["kanri_flg"]);
$k_flg=$_SESSION["kanri_flg"];

// getで送信されたidを取得

if(!isset($_GET['id'])){
    exit("Error");
}
$id=$_GET['id'];


//DB接続します
$pdo=db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM gs_bm_table WHERE id=:id';//WHERで一行上書き
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$user_menu='';

if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // fetch()で1レコードを取得して$rsに入れる
    // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
    // var_dump()で見てみよう
}

if($k_flg==1){
        $user_menu .= '<a href="user_index.php">ユーザー登録</a>';
        $user_menu .= '<a href="user_select.php">ユーザー一覧</a>';
    
}else{
        $user_menu .= '<a href="user_select.php">ユーザー一覧</a>';

}


?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo更新ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">図書館更新</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">図書館登録</a>
                        <a class="nav-link" href="select.php">図書館一覧</a>                   
                       
                        <?=$user_menu?>
                       
                        <a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a>
                    </li>


                </ul>
            </div>
        </nav>
    </header>

    <form method="post" action="update.php">
        <div class="form-group">
            <label for="name">図書館名</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="name" name="name" value="<?=$rs['name']?>">
        </div>
        <div class="form-group">
            <label for="url">住所</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="url" name="url" value="<?=$rs['url']?>">
        </div>
        <!-- <div class="form-group">
            <label for="comment">Comment</label>
            受け取った値挿入しよう -->
            <!-- <textarea class="form-control" id="comment" name="comment" rows="3" ><?=$rs['comment']?></textarea>
        </div> -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする-->
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>