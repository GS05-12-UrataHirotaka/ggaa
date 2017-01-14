<?php
//idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_book_table WHERE id=:id");
$stmt->bindValue(':id' , $id , PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view1="";
$view2="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view1 .= '<li class="nav-item"><a href="#tab'.$result["bid"].'" data-toggle="tab" class="nav-link bg-primary">'.$result["b_title"].'</a></li>';
    $view2 .= '<div class="tab-pane" id="tab'.$result["bid"].'">'.$result["b_page"].'</div>';
  }
}
?>

<ul class="nav nav-tabs">
    <?=$view1?>
</ul>
<div class="tab-content">
    <?=$view2?>
</div>
