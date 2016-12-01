<?php
include("functions.php");

//1.POSTでParamを取得
$id = $_POST["id"];
$book_name = $_POST["book_name"];
$book_url = $_POST["book_url"];
$book_comment = $_POST["book_comment"];

//2.DB接続など
$pdo = db_con();

//3.UPDATE
$stmt = $pdo->prepare("UPDATE gs_bm_table SET book_name=:book_name, book_url=:book_url, book_comment=:book_comment WHERE id=:id");
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    header("Location: bm_list_view.php");
    exit;
}

?>
