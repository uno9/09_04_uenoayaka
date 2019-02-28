<?php

//0. session start
session_start();
var_dump($_SESSION["kanri_flg"]);


//1. DB接続
include('functions.php');

//  1.5 ログインの状態チェック
chk_ssid();

$menu=menu($_SESSION["kanri_flg"]);
$k_flg=$_SESSION["kanri_flg"];

//POSTデータ取得
$pdo=db_conn();


//2. データ表示SQL作成
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view='';
$user_menu='';
$user_atteneion='';

// if ($status==false) {
//     //execute（SQL実行時にエラーがある場合）
//     $error = $stmt->errorInfo();
//     exit('sqlError:'.$error[2]);
// } else {
//     //Selectデータの数だけ自動でループしてくれる
//     //http://php.net/manual/ja/pdostatement.fetch.php
//     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $view .= '<li class="list-group-item">';
//         $view .= '<p>'.$result['indate'].'_'.$result['lid'].'_'.$result['name'].'_'.$result['kanri_flg'].'_'.$result['life_flg'].'</p>'; //'.$result['comment'].'
//         $view .= '<a href="user_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
//         $view .= '<a href="user_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';

//         $view .= '</li>';
//     }
// }

if($k_flg==1){
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['name'].'-'.$result['lpw'].'-'.$result['kanri_flg'].'-'.$result['life_flg'].'</p>';
        $view .= '<a href="user_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>'; //$result[id]はシングルで囲む
        $view .= '<a href="user_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';
        $view .= '</li>';
    }

}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['name'].'-'.$result['life_flg'].'</p>';
        $view .= '</li>';
    }

}

if($k_flg==1){
        $user_menu .= '<a href="user_index.php">ユーザー登録</a>';
    
}else{
        $user_atteneion.='<h4><font color="red">▲attention▽</font></h4>';
        $user_atteneion.='<h5>①ユーザーネーム<br>②１はアクティブユーザー<br>　０は非アクティブユーザー</h5>';
}



?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー保存リスト表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">ユーザー一覧</a>


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

    <div>
    <?=$user_atteneion?>
    </div>

    <div>
        <ul class='list-group'>
            <!-- ここにDBから取得したデータを表示しよう -->
            <?=$view?>
        </ul>
    </div>






</body>

</html>