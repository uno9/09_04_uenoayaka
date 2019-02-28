<?PHP

//session start
session_start();
var_dump($_SESSION["kanri_flg"]);

//0. 読み込み
include('functions.php');

//0.5 ログインチェック
chk_ssid();

$menu= menu($_SESSION["kanri_flg"]);
$k_flg=$_SESSION["kanri_flg"];

$user_menu='';

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
    <title>図書館図鑑</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        div{
            padding: 10px;
            font-size:20px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">図書館登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="select.php">図書館一覧</a>

                        <?=$user_menu?>                       

                        <a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="name">図書館名</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
      <div class="form-group">
            <label for="url">住所</label>
            <input type="text" class="form-control" id="url" name="url">
        </div>
        <!-- <div class="form-group">
            <label for="comment">感想</label>
            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea> -->
        </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    

</body>

</html>