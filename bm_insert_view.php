<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>研究データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/connectab.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<!-- Head[Start] -->
<?php  
    if($_SESSION["kanri_flg"]=="1"){
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
            <form method="post" action="bm_insert.php" style="display:inline">
                <h2>研究データ登録</h2>
                <label>タイトル：</label>
                <input type="text" name="book_name" class="form-control"><br>
                <label>研究領域：</label>
                <input type="text" name="book_url" class="form-control"><br>
                <label>コメント:</label><br>
                <textArea name="book_comment" rows="2" cols="40" class="form-control"></textArea><br>
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
