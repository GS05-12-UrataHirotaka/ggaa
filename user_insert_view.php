<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["role"]!="1"){
    exit("Error!!");
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ユーザ登録</title>
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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="user_insert.php" style="display:inline">
                <h2>ユーザ登録</h2>
                <label>名前：</label>
                <input type="text" name="name" class="form-control"><br>
                <label>ユーザID：</label>
                <input type="text" name="lid" class="form-control"><br>
                <label>パスワード：</label>
                <input type="text" name="lpw" class="form-control"><br>
                <label>管理フラグ：</label>
                <input type="radio" name="role" class="inlineRadioOptions" value="1" id="aduser"><label for="aduser">管理者</label>
                <input type="radio" name="role" class="inlineRadioOptions" value="0"  id="nuser" checked><label for="nuser">一般ユーザ</label><br><br>
                <label>利用フラグ：</label>
                <input type="radio" name="life_flg" class="inlineRadioOptions" value="0" checked id="active"><label for="active">利用中</label>
                <input type="radio" name="life_flg" class="inlineRadioOptions" value="1" id="suspend"><label for="suspend">利用停止</label><br><br>
                <button type="submit" class="btn btn-primary">送信</button>
                <a class="btn btn-danger" href="user_list_view.php">キャンセル</a>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->

<nav>
    <p style="text-align:right;padding-right:30px;"><font color="white">PHOTO taken by manfred majer</font></p>
</nav>

</body>
</html>
