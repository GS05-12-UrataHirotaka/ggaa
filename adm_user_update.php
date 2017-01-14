<?php
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["role"]!="2"){
    exit("Error!!");
}

//1.GETでidを取得
$id = $_GET['id'];

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
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="adm_user_update_act.php" style="display:inline">
                <h2>Update User</h2>
                <table class="table">
                    <tbody>
                      <tr>
                        <th>User ID</th>
                        <td><input type="text" name="lid" class="form-control" value="<?=$row["lid"]?>">
                        </td>
                      </tr>
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
                      <tr>
                        <th>Role</th>
                        <td><input type="radio" name="role" id="aduser" class="inlineRadioOptions" value="2" <?php if($row["role"]==2){print "checked";}?>><label for="aduser">Administrator</label>
                        <input type="radio" name="role" id="nuser" class="inlineRadioOptions" value="1" <?php if($row["role"]==1){print "checked";}?>><label for="nuser">Organization</label>
                        <input type="radio" name="role" id="nuser" class="inlineRadioOptions" value="0" <?php if($row["role"]==0){print "checked";}?>><label for="nuser">Researcher</label>
                        </td>
                      </tr>
                      <tr>
                        <th>Life Flag</th>
                        <td><input type="radio" name="life_flg" id="active" class="inlineRadioOptions" value="0" <?php if($row["life_flg"]==0){print "checked";}?>><label for="active">Active</label>
                        <input type="radio" name="life_flg" id="suspend" class="inlineRadioOptions" value="1" <?php if($row["life_flg"]==1){print "checked";}?>><label for="suspend">Suspended</label>
                        </td>
                      </tr>
                    </tbody>
                </table>
                <input type="hidden" name="id" value="<?=$id?>">
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="btn btn-warning" href="adm_user_list.php">Cancel</a>
                
                <div style="text-align:right"><a class="btn btn-danger" href="adm_user_delete_act.php?id=<?=$id?>">Delete</a></div>　　 
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