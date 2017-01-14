<?php
//データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>";
    $view .= h($result["lid"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["name"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["role"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["life_flg"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["regdate"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a class="btn btn-primary" href="adm_user_update.php?id='.$result["id"].'">';
    $view .= 'Edit';
    $view .= '</a>';  
    $view .= "</td>";
    $view .= "</tr>";
  }

}
?>

<table class="table">
    <thead>
       <tr>
        <th>UserID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Active</th>
        <th>Registered</th>
        <th></th>
       </tr>
    </thead>
    <tbody>
        <?=$view?>
    </tbody>
</table>