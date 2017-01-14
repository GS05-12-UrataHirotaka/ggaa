<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

$id = $_GET['id'];
$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
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
  <title>メッセージ送信</title>
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
       <h2 style="text-align:center;">Send Message</h2>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="message_add_act.php" style="display:inline">
                <table class="table">
                    <tbody>
                      <tr>
                          <td><textarea class="form-control" rows="10" id="comment" name="message"></textarea>
                          </td>
                      </tr>
                    </tbody>
                </table>
                <input type="hidden" name="id" value="<?=$id?>">  
                <div style="margin:7px 0;text-align:center;">
                <button type="submit" class="btn btn-primary">Send</button>
                <a class="btn btn-danger" href='rsc_main.php?id=<?=$id?>'>Cancel</a>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<!-- Main[End] -->

<nav>
<p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>
</nav>

</body>
</html>
