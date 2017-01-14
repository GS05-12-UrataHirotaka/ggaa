<?php
//idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_book_table WHERE lid=:id");
$stmt->bindValue(':id' , $id , PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="rsc_detail.php?id='.$result["bid"].'">';
    $view .= '<div class="box">';
    $view .= '<div class="box_txt">'.$result["b_title"].'</div>';
    $view .= '</div>';
    $view .= '</a>';
  }
}
?>

<div id="rlist" style="text-align:left;">
    <?=$view?>
</div>