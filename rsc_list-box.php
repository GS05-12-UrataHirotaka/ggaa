<?php
//データ選択SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE life_flg="0" AND role="0" ORDER BY id DESC');
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="rsc_main.php?id='.$result["id"].'">';
    $view .= '<div class="box">';
    $view .= '<div class="box_img"><img src="img/rsc_'.$result["uicon"].'.png" width="200" height="200"></div>';
    $view .= '<div class="box_title">'.$result["name"].'</div>';
    $view .= '<div class="box_txt">Univ: '.$result["affiliation"].'<br>Dept: '.$result["department"].'<br>Title: '.$result["title"].'<br>Theme: '.$result["field"].'</div>';
    $view .= '</div>';
    $view .= '</a>';
  }
}
?>
    


<div id="rlist">
    <?=$view?>   
</div>