<?php
include("functions.php");

//1.POSTでParamを取得
$id = $_POST['id'];
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

//2.DB接続など
$pdo = db_con();

//3.UPDATE
$stmt = $pdo->prepare("UPDATE gs_user_table SET lid=:lid, lpw=:lpw, name=:name, mail=:mail, role=:role, affiliation=:affiliation, department=:department, title=:title, other=:other, url=:url, field=:field, life_flg=:life_flg WHERE id=:id");
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
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT); 
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: adm_user_list.php");
    exit;
}

?>
