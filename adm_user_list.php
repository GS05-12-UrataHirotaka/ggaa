<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

if($_SESSION["role"]!="2"){
    exit("Error!!");
}

//1.DB接続
$pdo = db_con();

//２．データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>";
    $view .= h($result["name"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["lid"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["lpw"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["role"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a class="btn btn-primary" href="adm_user_update.php?id='.$result["id"].'">';
    $view .= 'Edit';
    $view .= '</a>';  
    $view .= "</td>";
    $view .= "</tr>";
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User's List</title>
    <link rel="stylesheet" href="css/reset.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="main">

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
        <div class="col-md-12">
           <h2>User's List　<a class="btn btn-primary" href="adm_user_insert.php">Add User</a></h2>
           <div id="ulist">
            <table class="table">
            <thead>
               <tr>
                <th>Name</th>
                <th>UserID</th>
                <th>Password</th>
                <th>Role</th>
                <th>Active</th>
                <th>Mail</th>
                <th>Affiliation</th>
                <th>Life_flg</th>
                <th>Research</th>
                <th>Business</th>
                <th>Insert</th>
                <th></th>
               </tr>
            </thead>
            <tbody>
                <?=$view?>
            </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
<!-- Main[End] -->

<nav>
</nav>

</body>
</html>
