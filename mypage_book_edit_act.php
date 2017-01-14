<?php
include("functions.php");

//1. POSTデータ取得
$bid = $_POST['bid'];
$b_title = $_POST['b_title'];
$b_page = $_POST['b_page'];

//2.DB CONNECTION
$pdo = db_con();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_book_table SET b_title=:b_title, b_page=:b_page WHERE bid=:bid");
$stmt->bindValue(':b_title', $b_title, PDO::PARAM_STR);
$stmt->bindValue(':b_page', $b_page, PDO::PARAM_STR);
$stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
//Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: mypage.php");
    exit;
}

?>
