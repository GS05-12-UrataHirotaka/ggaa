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
        <div class="col-md-3"></div>
        <div class="col-md-6">
           <h2>Add User</h2>
            <form method="post" action="adm_user_insert_act.php" style="display:inline">
                <table class="table">
                    <tbody>
                      <tr>
                        <th>User ID</th>
                        <td><input type="text" name="lid" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Password</th>
                        <td><input type="text" name="lpw" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Name</th>
                        <td><input type="text" name="name" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Mail</th>
                        <td><input type="text" name="mail" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Affiliation</th>
                        <td><input type="text" name="affiliation" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Department</th>
                        <td><input type="text" name="department" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Title</th>
                        <td><input type="text" name="title" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Other</th>
                        <td><input type="text" name="other" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>URL</th>
                        <td><input type="text" name="url" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Field</th>
                        <td><input type="text" name="field" class="form-control">
                        </td>
                      </tr>
                      <tr>
                        <th>Role</th>
                        <td>
                        <input type="radio" name="role" class="inlineRadioOptions" value="2" id="aduser"><label for="aduser">Organization</label>
                        <input type="radio" name="role" class="inlineRadioOptions" value="1" id="aduser"><label for="aduser">Administrator</label>
                        <input type="radio" name="role" class="inlineRadioOptions" value="0"  id="nuser" checked><label for="nuser">Researcher</label>
                        </td>
                      </tr>
                      <tr>
                        <th>Life Flag</th>
                        <td><input type="radio" name="life_flg" class="inlineRadioOptions" value="0" checked id="active"><label for="active">Active</label>
                        <input type="radio" name="life_flg" class="inlineRadioOptions" value="1" id="suspend"><label for="suspend">Suspended</label>
                        </td>
                      </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Send</button>
                <a class="btn btn-danger" href="adm_user_list.php">Cancel</a>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->

<nav>
<p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p>
</nav>

</body>
</html>
