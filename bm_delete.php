<?php
include("functions.php");

//1.Paramを取得
$id = $_GET["id"];

//2.DB CONNECTION
$pdo = db_con();

//3.DELETE
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: bm_list_view.php");
    exit;
}

?>