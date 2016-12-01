<?php
session_start();
include('functions.php');
ssidCheck();

//1.GETでidを取得
$id = $_GET['id'];

//2.DB接続など
$pdo = db_con();

//3.idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id' , $id , PDO::PARAM_INT);
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
  <title>Researcher's Detail</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/connectab.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<!-- Head[Start] -->
<?php  
    if($_SESSION["role"]=="1"){
        include("admin_menu.php");
    }else if($_SESSION["role"]=="0"){
        include("bm_menu.php");
    }
    
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
                <h2>研究データ詳細</h2>
                <label>タイトル：</label>
                <?=$row["book_name"]?><br>
                <label>内容：</label>
                <?=$row["book_url"]?><br>
                <label>コメント:</label><br>
                <?=$row["book_comment"]?><br>
                <input type="hidden" name="id" value="<?=$id?>">    
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <nav>
        <p style="text-align:right;padding-right:30px;"><font color="white">PHOTO taken by manfred majer</font></p>
    </nav>
    
</div>
<!-- Main[End] -->


</body>
</html>