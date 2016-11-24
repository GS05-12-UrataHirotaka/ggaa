<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

//1.DB接続
$pdo = db_con();

//２．データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY indate DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>";
    $view .= $result["indate"];
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href="bm_detail.php?id='.$result["id"].'">';
    $view .= h($result["book_name"]);
    $view .= "</a>";
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["book_url"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a class="btn btn-primary" href="bm_update_view.php?id='.$result["id"].'">';
    $view .= '変更';
    $view .= '</a>';  
    $view .= '</td>';  
    $view .= "</tr>";
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Researcher一覧</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/connectab.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="main">

<!-- Head[Start] -->
<?php  
    if($_SESSION["role"]=="1"){
        include("admin_menu.php");
    }else{
        include("bm_menu.php");
    }
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="rlist">
                <h2>Researcher's List</h2>
                <a href="index4.html">
                <div class="box">
                    <div class="box_txt">ユーザA</div>
                </div>
                </a>
                <a href="index2.html">
                <div class="box">
                    <div class="box_txt">ユーザB</div>
                </div>
                </a>
                <a href="index3.html"> 
                <div class="box">
                    <div class="box_txt">ユーザC</div>
                </div>
                </a>
                <a href="https://hi.toyo.jp/attend/toyo?lang=ja">                      
                <div class="box">
                    <div class="box_txt">ユーザD</div>
                </div>
                </a>
                <a href="#">    
                <div class="box">
                    <div class="box_txt">ユーザE</div> 
                </div>
                </a>
                <a href="#">
                <div class="box">
                    <div class="box_txt">ユーザF</div> 
                </div>
                </a>
                <a href="#">  
                <div class="box">
                    <div class="box_txt">ユーザG</div> 
                </div>
                </a>
                <a href="#">
                <div class="box">
                    <div class="box_txt">ユーザH</div> 
                </div>
                </a>   
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <nav>
        <p style="text-align:right;padding-right:30px;"><font color="white">PHOTO taken by manfred majer</font></p>
    </nav>

</div>
<!-- Main[End] -->

</body>
</html>
