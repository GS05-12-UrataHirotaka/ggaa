<?php
include("functions.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]=="" ||
  !isset($_POST["role"]) || $_POST["role"]=="" ||
  !isset($_POST["life_flg"]) || $_POST["life_flg"]==""
){
  header("Location: user_insert_view.php");
}

//1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$role = $_POST['role'];
$life_flg = $_POST['life_flg'];

//2.DB CONNECTION
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table( id, name, lid, lpw, role, life_flg )VALUES( NULL, :name, :lid, :lpw, :role, :life_flg )");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':role', $role, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: user_list_view.php");
    exit;
}

?>
