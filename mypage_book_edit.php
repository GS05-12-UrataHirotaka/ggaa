<?php
session_start();
include('functions.php');
ssidCheck();

$bid = $_GET['bid'];
$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM gs_book_table WHERE bid=:bid");
$stmt->bindValue(':bid' , $bid , PDO::PARAM_INT);
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
  <title>ページ更新</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
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
       <h2>Edit Page</h2>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="post" action="mypage_book_edit_act.php" style="display:inline">
                <table class="table">
                    <tbody>
                      <tr>
                          <th>タイトル</th>
                          <td><input type="text" name="b_title" class="form-control" value="<?=$row["b_title"]?>">
                          </td>
                      </tr>
                      <tr>
                          <th>本文</th>
                          <td><textarea class="ckeditor" cols="400" id="editor1" name="b_page" rows="20"><?=$row["b_page"]?></textarea></td>
                      </tr>
                    </tbody>
                </table>
                <input type="hidden" name="bid" value="<?=$bid?>">  
                <div style="margin:7px 0;text-align:center;">
                <button type="submit" class="btn btn-primary">Send</button>
                <a class="btn btn-danger" href="mypage.php">Cancel</a>
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
