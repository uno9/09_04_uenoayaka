<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function db_conn()
{
    $dbname='gs_f02_db04';
    $db='mysql:dbname='.$dbname.';charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
    return new PDO($db, $user, $pwd);
    } catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
    }
}


//SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:'.$error[2]);
}

function char($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


// SESSIONチェック＆リジェネレイト
function chk_ssid(){
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !=session_id()){
        //ログイン失敗。ログイン画面に戻る
            header('Location: login.php');
    }else{
        //ログイン成功。一覧画面へ
        session_regenerate_id(true);
        $_SESSION['chk_ssid']=session_id();

    }
}


// menuを決める
function menu()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="index.php">図書館登録</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="select.php">データ一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';

    return $menu;
};

?>
<!--ナビバー動かすためのソース-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
