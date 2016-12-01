<?php
//0.外部ファイル読み込み
session_start();
include('functions.php');
ssidCheck();

//1.データ取得
$book_name = $_POST["book_name"];
$book_url = $_POST["book_url"];
$date_st = $_POST["date_st"];
$date_en = $_POST["date_en"];

//2.DB接続
$pdo = db_con();

//3.データ選択SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE indate BETWEEN :date_st AND :date_en AND book_name LIKE :book_name AND book_url LIKE :book_url ORDER BY indate DESC");
$stmt->bindValue(':date_st' , $date_st , PDO::PARAM_INT);
$stmt->bindValue(':date_en' , $date_en , PDO::PARAM_INT);
$stmt->bindValue(':book_name' , '%'.$book_name.'%' , PDO::PARAM_INT);
$stmt->bindValue(':book_url' , '%'.$book_url.'%' , PDO::PARAM_INT);
$status = $stmt->execute();

//4.データ表示
$view="";
if($status==false){
  queryError($stmt);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<tr>";
    $view .= "<td>";
    $view .= $result["indate"];
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href="bm_update_view.php?id='.$result["id"].'">';
    $view .= h($result["book_name"]);
    $view .= "</a>";
    $view .= "</td>";
    $view .= "<td>";
    $view .= h($result["book_url"]);
    $view .= "</td>";
    $view .= "<td>";
    $view .= '<a href="bm_delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';  
    $view .= '</td>';  
    $view .= "</tr>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>研究データ一覧</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bookmark.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body id="main">

<!-- Head[Start] -->
<?php  
    if($_SESSION["role"]=="1"){
        include("bm_admenu.php");
    }else{
        include("bm_menu.php");
    }
    
?>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <h2>研究データ一覧</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <h4>＜フィルタ＞</h4>
            <form method="post" action="bm_select_view.php" style="display:inline">
                <label>登録期間(開始)：</label>
                <input type="date" name="date_st" class="form-control"><br>
                <label>登録期間(終了)：</label>
                <input type="date" name="date_en" class="form-control"><br>
                <label>書籍名：</label>
                <input type="text" name="book_name" class="form-control"><br>
                <label>URL：</label>
                <input type="text" name="book_url" class="form-control"><br>
                <button type="submit" class="btn btn-info">絞込み</button><br>
            </form>
        </div>
        <div class="col-md-9">
            <table class="table">
            <thead>
               <tr>
                <th>登録日時</th>
                <th>書籍名</th>
                <th>URL</th>
                <th></th>
               </tr>
            </thead>
            <tbody>
                <?=$view?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
