<?php

include('functions.php');
// 入力チェック
if(
    !isset($_POST['name'])||$_POST['name']==''||
    !isset($_POST['url'])||$_POST['url']==''
    
){


    exit('ParamError');
}


//POSTデータ取得

$name=$_POST['name'];
$url=$_POST['url'];
// $comment=$_POST['comment'];
    // exit($name);

$pdo=db_conn();


//データ登録SQL作成
$sql ='INSERT INTO gs_bm_table(id,name,url,indate)VALUES(NULL,:a1,:a2,sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $url, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a3', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)



$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    // 入力に失敗しなかった時
    //５．index.phpへリダイレクト
    header('Location: index.php');
}
