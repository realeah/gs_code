
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ホーム画面</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/range.css">

<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <ul class="nav-list">
        <li class="nav-item"><a href="detail.php">新規データ登録</a></li>
        <li class="nav-item"><a href="select.php">登録内容を見る</a></li>
        <li class="nav-item"><a href="user_select.php">ユーザー情報を見る</a></li>
        <li class="nnav-item"><a href="logout.php">ログアウト</a></li>
     </ul>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?php echo $view;?></div> 
</div>
<!-- Main[End] -->

</body>
</html>