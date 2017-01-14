<?php
include("functions.php");

//入力チェック(受信確認処理追加)
if(
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]=="" ||
  !isset($_POST["role"]) || $_POST["role"]=="" ||
  !isset($_POST["life_flg"]) || $_POST["life_flg"]==""
){
  header("Location: adm_user_insert.php");
}

//1. POSTデータ取得
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$name = $_POST['name'];
$mail = $_POST['mail'];
$role = $_POST['role'];
$affiliation = $_POST['affiliation'];
$department = $_POST['department'];
$title = $_POST['title'];
$other = $_POST['other'];
$url = $_POST['url'];
$field = $_POST['field'];
$life_flg = $_POST['life_flg'];

//2.DB CONNECTION
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table( id, lid, lpw, name, mail, role, affiliation, department, title, other, url, field, regdate, life_flg )VALUES( NULL, :lid, :lpw, :name, :mail, :role, :affiliation, :department, :title, :other, :url, :field, sysdate(), :life_flg )");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_INT);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_INT);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':role', $role, PDO::PARAM_INT);
$stmt->bindValue(':affiliation', $affiliation, PDO::PARAM_STR);
$stmt->bindValue(':department', $department, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':other', $other, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':field', $field, PDO::PARAM_STR);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: adm_user_list.php");
    exit;
}

?>
