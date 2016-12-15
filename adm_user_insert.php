<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["role"]!="2"){
    exit("Error!!");
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ユーザ登録</title>
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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="adm_user_insert_act.php" style="display:inline">
                <h2>ユーザ登録</h2>
                <table class="table">
                    <tbody>
                      <tr>
                        <th>ユーザID</th>
                        <td><input type="text" name="lid" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>パスワード</th>
                        <td><input type="text" name="lpw" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>氏名</th>
                        <td><input type="text" name="name" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>メールアドレス</th>
                        <td><input type="text" name="mail" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>所属</th>
                        <td><input type="text" name="affiliation" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>部署</th>
                        <td><input type="text" name="department" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>職名</th>
                        <td><input type="text" name="title" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>その他</th>
                        <td><input type="text" name="other" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>URL</th>
                        <td><input type="text" name="url" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>関心領域</th>
                        <td><input type="text" name="field" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>ロール</th>
                        <td><input type="radio" name="role" class="inlineRadioOptions" value="1" id="aduser"><label for="aduser">管理者</label>
                        <input type="radio" name="role" class="inlineRadioOptions" value="0"  id="nuser" checked><label for="nuser">研究者</label>
                        </td>
                      </tr>
                      <tr>
                        <th>利用フラグ</th>
                        <td><input type="radio" name="life_flg" class="inlineRadioOptions" value="0" checked id="active"><label for="active">利用中</label>
                        <input type="radio" name="life_flg" class="inlineRadioOptions" value="1" id="suspend"><label for="suspend">利用停止</label>
                        </td>
                      </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">送信</button>
                <a class="btn btn-danger" href="adm_user_list.php">キャンセル</a>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->

<nav>
</nav>

</body>
</html>
