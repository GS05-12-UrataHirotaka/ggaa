<?php
session_start();
include('functions.php');
ssidCheck();

//1.セッションからユーザIDを取得
$lid = $_SESSION["lid"];

//2.DB接続など
$pdo = db_con();

//3.idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid");
$stmt->bindValue(':lid' , $lid , PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    $row = $stmt->fetch();
}
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
        <div class="col-md-8">
            <h2>My Page</h2>
            <div id="rlist">
                <a href="index4.html">
                <div class="box">
                    <div class="box_txt">BOOKA</div>
                </div>
                </a>
                <a href="index2.html">
                <div class="box">
                    <div class="box_txt">BOOKB</div>
                </div>
                </a>
                <a href="index3.html"> 
                <div class="box">
                    <div class="box_txt">BOOKC</div>
                </div>
                </a>
                <a href="https://hi.toyo.jp/attend/toyo?lang=ja">                      
                <div class="box">
                    <div class="box_txt">BOOKD</div>
                </div>
                </a>
                <a href="#">    
                <div class="box">
                    <div class="box_txt">BOOKE</div> 
                </div>
                </a>
                <a href="#">
                <div class="box">
                    <div class="box_txt">BOOKF</div> 
                </div>
                </a>
                <a href="#">  
                <div class="box">
                    <div class="box_txt">BOOKG</div> 
                </div>
                </a>
                <a href="#">
                <div class="box">
                    <div class="box_txt">BOOKH</div> 
                </div>
                </a>   
            </div>
        </div>
        <div class="col-md-4">
            <div id="mpage">
               <h3>ユーザ情報　<a class="btn btn-primary" href="mypage_userinfo_edit.php">Edit</a></h3>
                <table class="table">
                    <tbody>
                      <tr>
                        <th>ユーザID</th>
                        <td><?=$row["lid"]?></td>
                      </tr>                      
                      <tr>
                        <th>氏名</th>
                        <td><?=$row["name"]?></td>
                      </tr>
                      <tr>
                        <th>メールアドレス</th>
                        <td><?=$row["mail"]?></td>
                      </tr>
                      <tr>
                        <th>所属</th>
                        <td><?=$row["affiliation"]?></td>
                      </tr>
                      <tr>
                        <th>部署</th>
                        <td><?=$row["department"]?></td>
                      </tr>
                      <tr>
                        <th>職名</th>
                        <td><?=$row["title"]?></td>
                      </tr>
                      <tr>
                        <th>その他</th>
                        <td><?=$row["other"]?></td>
                      </tr>
                      <tr>
                        <th>URL</th>
                        <td><?=$row["url"]?></td>
                      </tr>
                      <tr>
                        <th>関心領域</th>
                        <td><?=$row["field"]?></td>
                      </tr>
                    </tbody>
                </table>
                <h3>研究情報　<a class="btn btn-primary" href="mypage_rscinfo_edit.php">Edit</a></h3>
                <table class="table">
                    <tbody>
                      <tr>
                        <th>学歴</th>
                        <td><?=$row["field"]?></td>
                      </tr>
                      <tr>
                        <th>学位</th>
                        <td><?=$row["field"]?></td>
                      </tr>
                      <tr>
                        <th>経歴</th>
                        <td><?=$row["field"]?></td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Main[End] -->
</body>
</html>