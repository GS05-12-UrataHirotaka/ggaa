<?php
session_start();
include('functions.php');
ssidCheck();

//1.セッションからユーザIDを取得
$id = $_SESSION["id"];

//2.DB接続など
$pdo = db_con();

//3.idから情報取得
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
  <title>ユーザ更新</title>
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
       <h2>Edit Userinfo</h2>
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="mypage_userinfo_edit_act.php" style="display:inline">
                <table class="table">
                    <tbody>
                      <tr>
                        <th>Password</th>
                        <td><input type="text" name="lpw" class="form-control" value="<?=$row["lpw"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Name</th>
                        <td><input type="text" name="name" class="form-control" value="<?=$row["name"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Mail</th>
                        <td><input type="text" name="mail" class="form-control" value="<?=$row["mail"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Affiliation</th>
                        <td><input type="text" name="affiliation" class="form-control" value="<?=$row["affiliation"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Department</th>
                        <td><input type="text" name="department" class="form-control" value="<?=$row["department"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Title</th>
                        <td><input type="text" name="title" class="form-control" value="<?=$row["title"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Other</th>
                        <td><input type="text" name="other" class="form-control" value="<?=$row["other"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>URL</th>
                        <td><input type="text" name="url" class="form-control" value="<?=$row["url"]?>">
                        </td>
                      </tr>
                      <tr>
                        <th>Field</th>
                        <td><input type="text" name="field" class="form-control" value="<?=$row["field"]?>">
                        </td>
                      </tr>
                    </tbody>
                </table>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-warning" href="mypage.php">Cancel</a>　　 
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->


</body>
</html>