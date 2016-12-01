<?php
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["role"]!="1"){
    exit("Error!!");
}

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
  <title>ユーザ更新</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="user_update.php" style="display:inline">
                <h2>User Update</h2>
                <label>Name: </label>
                <input type="text" name="name" class="form-control" value="<?=$row["name"]?>"><br>
                <label>User ID: </label>
                <input type="text" name="lid" class="form-control" value="<?=$row["lid"]?>"><br>
                <label>Password: </label>
                <input type="text" name="lpw" class="form-control" value="<?=$row["lpw"]?>"><br>
                <br>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-warning" href="bm_mypage.php">Cancel</a>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->


</body>
</html>