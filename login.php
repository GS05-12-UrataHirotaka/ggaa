<?php
session_start();
include('functions.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Top Page</title>
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
        <div class="col-md-6" id="login">
            <form method="post" action="login_act.php" style="display:inline">
                <h2 style="color:#ffffff;">CONNECTAB</h2>
                <input type="text" name="lid" class="form-control" placeholder="Username"><br>
                <input type="text" name="lpw" class="form-control" placeholder="Password"><br>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
            <button type="submit" class="btn btn-success">SignUp</button>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>