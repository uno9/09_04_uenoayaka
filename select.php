<?php
//session start
session_start();

var_dump($_SESSION["kanri_flg"]);


//1. DB接続
include('functions.php');

//ログイン状態のチェック
chk_ssid();

$menu=menu($_SESSION["kanri_flg"]);//sessionにログインした人の情報（localhost）が入っている
$k_flg=$_SESSION["kanri_flg"];

//1.5   DB接続します
$pdo=db_conn();

//2. データ表示SQL作成
$sql = 'SELECT * FROM gs_bm_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view='';
$user_menu='';

// if ($status==false) {
//     //execute（SQL実行時にエラーがある場合）
//     $error = $stmt->errorInfo();
//     exit('sqlError:'.$error[2]);
// } else {
//     //Selectデータの数だけ自動でループしてくれる
//     //http://php.net/manual/ja/pdostatement.fetch.php
//     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $view .= '<li class="list-group-item">';
//         $view .= '<p>'.$result['name'].'_'.$result['url'].'_'.$result['indate'].'</p>'; //'.$result['comment'].'
//         $view .= '<a href="detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
//         $view .= '<a href="delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';

//         $view .= '</li>';
//     }
// }
var_dump($user_menu);


if($k_flg==1){
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['name'].'-'.$result['url'].'</p>';
        $view .= '<a href="detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>'; //$result[id]はシングルで囲む
        $view .= '<a href="delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a>';
        $view .= '</li>';
    }

    {
        $user_menu .= '<a href="user_index.php">ユーザー登録</a>';
        $user_menu .= '<a href="user_select.php">ユーザー一覧</a>';
    }
}else{
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['name'].'-'.$result['url'].'</p>';
        $view .= '</li>';
    }

   {
        $user_menu .= '<a href="user_select.php">ユーザー一覧</a>';
    }

}


?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>保存リスト表示</title>
    <style>
        .map {
            height:500px;
            width:100%;
        }


div {
            padding: 10px;
            font-size: 16px;
        }

        .output{
            height:100px;
            width:100%;

        }


     </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">図書館一覧</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                
            </button> 
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">図書館登録</a>

                        <?=$user_menu?>

                        <a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a>
                    </li>

                </ul>
            </div>
        </nav>

    </header>


    <div>
        <ul class='list-group'>
            <!-- ここにDBから取得したデータを表示しよう -->
            <?=$view?>
        </ul>
    </div>

    <div class=attention>
        <h2>福岡県福岡市にある図書館</h2>
        <h5>赤マルは、図書館です。</h5>
    </div>

    <div id='output' class = 'map'></div>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Attvaf0Un8tqVzhYGod5P_6piofAtL8xomc3zQ7tENXu_rcv72efNHHyFeXqe-QJ'
        async defer></script>
    <script> 
        // var url='http://api.calil.jp/library?appkey=9cf61f5ff35415af253798e84783bc88&limit=10'
        var url='http://api.calil.jp/library?appkey=9cf61f5ff35415af253798e84783bc88&pref=福岡県&city=福岡市&format=json&callback='
        // var url='https://api.calil.jp/library%3Fappkey%3D9cf61f5ff35415af253798e84783bc88%26pref%3D福岡県%26city%3D福岡市%26format%3Djson'
    </script>
        
    <script>
        'use strict';

        // let target = url;
        // const target = `http://cors-allow.azurewebsites.net/?url=${url}`;
        $.ajax({
            url: url,
            // url: target,
            data: 'json'
        })
        .done((res) => {
            console.log(res)//apiのデータを取得


        });

        
    </script>


    <script>
        // console.log(target);

        function mapsInit() {
            // 座標を変数に入れる処理

            const lat =  33.590355; //緯度
            const lng = 130.401716;//経度

            // 変数を中心にして地図を表示する処理
            map = new Microsoft.Maps.Map('#output', {
                center: {
                    latitude: lat,
                    longitude: lng
                },
                mapTypeId: Microsoft.Maps.MapTypeId.load,
                zoom: 13
            });
            // pushpin(lat, lng, map);
        };
        function pushpin(lat, lng,map) {
            let location = new Microsoft.Maps.Location(lat, lng)
            let pin = new Microsoft.Maps.Pushpin(location, {
                color: 'red',
                visible: true
            });
            map.entities.push(pin);
        };

        function getliblocation(){
        $.getJSON({
            url:url,
            format: 'json'
            },
        
            function(data) {
            //   $.each(data.items, function(i,item){
            //     $("<img/>").attr("src", item.media.m).appendTo("#images");
            //     if ( i == 2 ) return false;
            //   });

            console.log(data[0].geocode);
            console.log(data[0].geocode.length);
            console.log(data[0].geocode.indexOf(","));//カンマを取る
            console.log(data[0].geocode.substring(0,9));//経度
            console.log(data[0].geocode.substring(11,20));//緯度
            
            console.log(data);

            // let lng=data[0].geocode.substring(0,9);
            // let lat=data[0].geocode.substring(11,20);


            for (let i=0;i<data.length;i++){

                let length=data[i].geocode.length;
                let canma=data[i].geocode.indexOf(",");
                let lng=data[i].geocode.substring(0,canma-1);//緯度
                let lat=data[i].geocode.substring(canma+1,length);//経度
            //   console.log(lng,lat);
              
                pushpin(lat,lng,map);

            };
            
            // let lng=data[i].geocode.substring(0,9);
            // let lat=data[i].geocode.substring(11,20);
            
            // console.log(lng,lat);
            

            });

            // .fail(funtion(){
            //     console.log("error");
            // })   

            
        };



        $(window).on('load',function(){
            mapsInit();
            getliblocation();
        });
   


    </script>



</body>

</html>