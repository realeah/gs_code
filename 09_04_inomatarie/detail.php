<?php
$id = $_GET["id"];

//1.  DB接続します
include("funcs.php");
sessChk();

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  sqlError($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  $row = $stmt->fetch();
  // var_dump($row);
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<title>データ更新</title>
<!-- <link rel="stylesheet" href="css/range.css"> -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新</legend>
     <label>書籍名：<input type="text" name="name" value="<?php echo $row["name"];?>"></label><br>
     <!-- <label>年齢：<input type="text" name="age" class="age"></label><br> -->
     <label>Link：<input type="text" name="url" value="<?php echo $row["url"];?>"></label><br>
     <label>感想：<textArea name="naiyou" rows="4" cols="40" value="<?php echo $row["naiyou"];?>"></textArea></label><br>
     <input type="hidden" name="id" value="<?php echo $id ?>">
     
     <input type="submit" value="更新する">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>