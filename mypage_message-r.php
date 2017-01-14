<?php
//idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_message_table INNER JOIN gs_user_table ON gs_message_table.sid = gs_user_table.id WHERE rid=:rid");
$stmt->bindValue(':rid' , $id , PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<div class="panel panel-primary message"><div class="panel-heading"><h3 class="panel-title">FROM '.$result["name"].':'.$result["regdate"].'</h3></div><div class="panel-body">'.nl2br($result["message"]).'</div></div>';
  }
}
?>

<?=$view?>