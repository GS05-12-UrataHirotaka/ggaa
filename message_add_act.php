<?php
session_start();
include('functions.php');
ssidCheck();

//1. POSTデータ取得
$rid = $_POST['id'];
$sid = $_SESSION['id'];
$message = $_POST['message'];

//2.DB CONNECTION
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_message_table( mid, sid, rid, message, regdate)VALUES(NULL, :sid, :rid, :message, sysdate() )");
$stmt->bindValue(':sid', $sid, PDO::PARAM_INT);
$stmt->bindValue(':rid', $rid, PDO::PARAM_INT);
$stmt->bindValue(':message', $message, PDO::PARAM_STR);
//Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: rsc_main.php?id=$sid");
    exit;
}

?>
