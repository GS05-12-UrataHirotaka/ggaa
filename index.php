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

<!-- スムーズスクロール部分の記述 -->
<script>
$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 1000; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});

<!-- ページトップに戻る -->
//■page topボタン
$(function(){
var topBtn=$('#pageTop');
topBtn.hide();
 
//◇ボタンの表示設定
$(window).scroll(function(){
  if($(this).scrollTop()>80){
    //---- 画面を80pxスクロールしたら、ボタンを表示する
    topBtn.fadeIn();
  }else{
    //---- 画面が80pxより上なら、ボタンを表示しない
    topBtn.fadeOut();
  } 
});
 
// ◇ボタンをクリックしたら、スクロールして上に戻る
topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},500);
  return false;
});

});
    
</script>
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
        <table class="table table-hover">
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
            </tbody>
        </table>
        <div class="right">
            <a href="#">ニュース一覧を見る</a>
        </div>
    </div>
            
    <!-- コンセプト -->
    <div class="row feature" style="background-color: #7AC2E8;">
        <h2 class="topic" style="color: #ffffff;">研究とビジネスをもっと近づける</h2>
        <div class="col-md-6">
            <div class="fimage1"></div>
        </div>
        <div class="col-md-6">
            <p class="lead" style="color:#ffffff">大学などの研究機関と民間企業が連携することで、新しいものを社会に生み出す。<br>「産学連携」は、研究とビジネスをつなぐキーワードです。しかし、実際に企業でアカデミックな知識が必要となっても、それに対応した研究者が見つからない。逆に、研究内容を社会に活かそうとしても、企業とのつながりがない。<br>「connectab」は、そんな課題を解決し、アカデミックな世界とビジネスの世界をつなぐ（connect academy to business）サービスです。
            </p>
        </div>
    </div>
    
    <!-- 主な機能 -->
    <div class="row feature">
        <h2 class="topic">主な機能</h2>
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
        <h2 class="topic" style="color: #ffffff;">登録されている研究者</h2>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="rlist">
                <a href="index4.html">
                <div class="box">
                    <div class="box_txt">研究者A</div>
                </div>
                </a>
                <a href="index2.html">
                <div class="box">
                    <div class="box_txt">研究者B</div>
                </div>
                </a>
                <a href="index3.html"> 
                <div class="box">
                    <div class="box_txt">研究者C</div>
                </div>
                </a>
                <a href="https://hi.toyo.jp/attend/toyo?lang=ja">                      
                <div class="box">
                    <div class="box_txt">研究者D</div>
                </div>
                </a>
                <a href="#">    
                <div class="box">
                    <div class="box_txt">研究者E</div> 
                </div>
                </a>
                <a href="#">
                <div class="box">
                    <div class="box_txt">研究者F</div> 
                </div>
                </a>
                <a href="#">  
                <div class="box">
                    <div class="box_txt">研究者G</div> 
                </div>
                </a>
                <a href="#">
                <div class="box">
                    <div class="box_txt">研究者H</div> 
                </div>
                </a>   
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    
    <!-- more info -->
    <div class="row feature">
        <h2 class="topic">More Info</h2>
        <div class="col-md-6">
            <div class="fimage5"></div>
        </div>
        <div class="col-md-6">
            <p class="lead">推奨環境：…</p>
        </div>
    </div>
</div>

<p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>

<footer>
    
</footer>
</body>