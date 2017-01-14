<?php
session_start();
include('functions.php');
ssidCheck();

//1.セッションからユーザIDを取得
$id = $_SESSION["id"];

//2.DB接続など
$pdo = db_con();
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
    <div class="row">
       <h2><?=$_SESSION["name"]?>'s Laboratory　<a class="btn btn-success" href="mypage.php">Back</a></h2>
        <div class="col-md-8">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="#tabr" data-toggle="tab" class="nav-link bg-primary">RECEIVE</a>
                </li>
                <li class="nav-item">
                    <a href="#tabs" data-toggle="tab" class="nav-link bg-primary">SEND</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tabr">
                    <?php include("mypage_message-r.php")?>
                </div>
                <div class="tab-pane" id="tabs">
                    <?php include("mypage_message-s.php")?>
                </div>
            </div> 
        </div>
        
        <div class="col-md-4">
            <div id="mpage">
               <h3>User Info　<a class="btn btn-primary" href="mypage_userinfo_edit.php">Edit</a></h3>
               <?php include("mypage-utable.php")?>  
            </div>
        </div>
    </div>
</div>
<!-- Main[End] -->

<nav>
<p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>
</nav>

</body>
</html>