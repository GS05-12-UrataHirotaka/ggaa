<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');

//1.DB接続
$pdo = db_con();

//２．データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY id DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="rsc_view.php?id='.$result["id"].'">';
    $view .= '<div class="box">';
    $view .= '<div class="box_txt">'.$result["name"].'</div>';
    $view .= '</div>';
    $view .= '</a>';
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Researcher一覧</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="main">

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
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="rlist">
                <h2>Researcher's List</h2>
                <?=$view?>   
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>

    <nav>
        <p style="text-align:right;padding-right:30px;"></p>
    </nav>

</div>
<!-- Main[End] -->

</body>
</html>
