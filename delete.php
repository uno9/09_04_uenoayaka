<?php

include('functions.php');

//GETデータ取得
$id=$_GET['id'];

//DBに接続します（エラー処理追加）      
$pdo=db_conn();

//データ登録SQL作成
$sql='DELETE FROM gs_bm_table WHERE id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status=$stmt->execute();

//データ登録処理後
if ($status==false){
    errorMsg($stmt);
}else{
    //select.phpへリダイレクト
    header('Location:select.php');
    exit;
}