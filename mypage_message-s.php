<?php
//idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_message_table INNER JOIN gs_user_table ON gs_message_table.rid = gs_user_table.id WHERE sid=:sid");
$stmt->bindValue(':sid' , $id , PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="panel panel-primary message"><div class="panel-heading"><h3 class="panel-title">TO '.$result["name"].':'.$result["regdate"].'</h3></div><div class="panel-body">'.nl2br($result["message"]).'</div></div>';
  }
}
?>

<?=$view?>