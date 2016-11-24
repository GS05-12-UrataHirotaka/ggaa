<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ログイン</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/connectab.css" rel="stylesheet">
  <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<!-- Head[Start] -->

<!-- Head[End] -->

<!-- Main[Start] -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" id="login">
            <form method="post" action="login_act.php" style="display:inline">
                <h2>CONNECTAB</h2>
                <input type="text" name="lid" class="form-control" placeholder="Username"><br>
                <input type="text" name="lpw" class="form-control" placeholder="Password"><br>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>