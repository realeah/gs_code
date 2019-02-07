<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="login.php">ログイン</a>

    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>登録</legend>
        <label>名前:<input type="text" name="name" /></label><br>
        <label>ID:<input type="text" name="lid" /></label><br>
        <label>PW:<input type="password" name="lpw" /></label><br>
        <label>管理者情報:<input type="text" name="kanri_flg" /></label><br>
        <label>会員種別:<input type="text" name="life_flg" /></label><br>
        <input type="submit" value="登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>