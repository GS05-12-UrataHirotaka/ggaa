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
  <title>研究データ更新</title>
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
    }else{
        include("bm_menu.php");
    }
    
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="bm_update.php" style="display:inline">
                <h2>研究データ更新</h2>
                <label>タイトル：</label>
                <input type="text" name="book_name" class="form-control" value="<?=$row["book_name"]?>"><br>
                <label>内容：</label>
                <input type="text" name="book_url" class="form-control" value="<?=$row["book_url"]?>"><br>
                <label>コメント:</label><br>
                <textArea name="book_comment" rows="2" cols="40" class="form-control"><?=$row["book_comment"]?></textArea><br>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-primary">送信</button>
                <a class="btn btn-danger" href="bm_list_view.php">キャンセル</a>
            </form>
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