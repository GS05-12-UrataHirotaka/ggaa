<?php
include("functions.php");

//1.POSTでParamを取得
$id = $_POST["id"];
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$role = $_POST['role'];
$life_flg = $_POST['life_flg'];

//2.DB接続など
$pdo = db_con();

//3.UPDATE
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw, role=:role, life_flg=:life_flg WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':role', $role, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: user_list_view.php");
    exit;
}

?>
