<?php
//idから情報取得
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id' , $id , PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
    queryError($stmt);
}else{
    $row = $stmt->fetch();
}
?>

<table class="table">
    <tbody>                      
      <tr>
        <th>Name</th>
        <td><?=$row["name"]?></td>
      </tr>
      <tr>
        <th>Affiliation</th>
        <td><?=$row["affiliation"]?></td>
      </tr>
      <tr>
        <th>Department</th>
        <td><?=$row["department"]?></td>
      </tr>
      <tr>
        <th>Title</th>
        <td><?=$row["title"]?></td>
      </tr>
      <tr>
        <th>Other</th>
        <td><?=$row["other"]?></td>
      </tr>
      <tr>
        <th>URL</th>
        <td><?=$row["url"]?></td>
      </tr>
      <tr>
        <th>Field</th>
        <td><?=$row["field"]?></td>
      </tr>
    </tbody>
</table>