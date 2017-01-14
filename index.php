<?php
session_start();
include('functions.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Top Page</title>
<link rel="stylesheet" href="css/reset.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
</head>
 
<body>
<!-- Head[Start] -->
<?php  
    if(isset($_SESSION["role"])){
        if($_SESSION["role"]=="0"){
            include("menu_rsc.php");
        }else if($_SESSION["role"]=="1"){
            include("menu_org.php");
        }else if($_SESSION["role"]=="2"){
            include("menu_adm.php");
        }
    }else{
        include("menu_gst.php");
    }
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    
    <!-- メイン画像 -->
    <div class="row">
       <div class="maint"></div>
    </div>
    
    <!-- お知らせ -->
    <div class="row" id="news">
        <h2 class="topic">NEWS</h2>
        <table class="table table-hover" style="margin-bottom:50px;">
            <tbody>
                <tr>
                 <th>2015.07.12</th>
                    <td>
                        <a href="#">募集始めました！</a>
                    </td>
                </tr>
                <tr>
                    <th>2015.06.12</th>
                    <td>
                        <a href="#">スタートアップイベントのお知らせ</a>
                    </td>
                </tr>
                <tr>
                    <th>2015.04.11</th>
                    <td>
                        <a href="#">ベータ版サービスを開始しました</a>
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td style="text-align:right;">
                        <a href="#">ニュース一覧を見る</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
            
    <!-- コンセプト -->
    <div class="row feature" style="background-color: #7AC2E8;">
        <h2 class="topic" style="color: #ffffff;">研究とビジネスをつなぐ新しいサービス</h2>
        <div class="col-md-6">
            <div class="fimage1"></div>
        </div>
        <div class="col-md-6">
            <p class="lead" style="color:#ffffff">企業が新しいサービスを立ち上げる際に、専門家の知識・監修を得る。研究者が新しい領域の研究をする際に、研究資金の確保やフィールド調査の協力を得る。<br>研究者と企業とがつながれば、もっと世の中に役立つものが生まれてくるかもしれない。<br>「CONNECTAB」は、アカデミックな世界とビジネスの世界をつなぐ（connect academy to business）サービスです。
            </p>
        </div>
    </div>
    
    <!-- 主な機能 -->
    <div class="row feature">
        <h2 class="topic">CONNECTABでできること</h2>
        <div class="col-md-4">
            <h2 class="topic">研究情報の公開</h2>
            <div class="fimage2"></div>
            <p class="lead flead">研究情報を作成し、公開できます。</p>
        </div>
        <div class="col-md-4">
            <h2 class="topic">研究者の検索</h2>
            <div class="fimage3"></div>
            <p class="lead flead">研究者を検索できます。</p>
        </div>
        <div class="col-md-4">
            <h2 class="topic">研究者・企業へのメッセージ</h2>
            <div class="fimage4"></div>
            <p class="lead flead">研究者・企業へメッセージを出すことができます。</p>
        </div>
    </div>
    
    <!-- トピック -->
    <div class="row feature" style="background-color: #7AC2E8;">
        <h2 class="topic" style="color: #ffffff;">例えば...</h2>
        <div class="col-md-4">
            <h2 class="topic" style="color: #ffffff;">食品メーカー×栄養学</h2>
            <div class="fimage6"></div>
            <p class="lead flead">栄養学の小柴先生監修のもと、健康に良いケーキを開発！</p>
        </div>
        <div class="col-md-4">
            <h2 class="topic" style="color: #ffffff;">ゲーム開発会社×歴史学</h2>
            <div class="fimage7"></div>
            <p class="lead flead">三国志研究の大家・西国先生監修のもと、本格歴史ゲームを開発！</p>
        </div>
        <div class="col-md-4">
            <h2 class="topic" style="color: #ffffff;">ニュース配信会社×観光学</h2>
            <div class="fimage8"></div>
            <p class="lead flead">観光学の権威・smith先生が、ニュース記事の信頼性を保証！</p>
        </div>
        <div class="col-md-1"></div>
    </div>
    
    <!-- more info -->
    <div class="row feature">
        <h2 class="topic">More Infomation</h2>
        <div class="col-md-6">
            <div class="fimage5"></div>
        </div>
        <div class="col-md-6">
            <p class="lead">
            推奨環境：最新バージョンのFireFox,Google Chrome<br>※CONNECTABは現在開発中のサービスです。まだ一般の方向けにオープンはされていません。</p>
        </div>
    </div>
</div>

<p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>

<footer>
    
</footer>
</body>