<?php
session_start();
//1.  DB接続します
include("funcs.php");
sessChk();

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY name ASC");
$status = $stmt->execute();

//３．データ表示
$view = "";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  sqlError($stmt);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<p>';
    $view .= '<a href="user_detail.php?id='.$result["id"].'">';
    $view .= "名前：".$result["name"]."<br>"."ID：".$result["lid"]."<br>"."PASSWORD：".$result["lpw"]."<br>"."管理者番号：".$result["kanri_flg"]."<br>"."life_flg：".$result["life_flg"]."<br>";
    $view .= ' ';
    if($_SESSION["kanri_flg"]=="1"){
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= '[ 削除 ]';
        $view .= '</a>';
        };

        $view .= '</p>';

  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ユーザー情報表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="user_detail.php">ユーザー登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>

      </div>
    </div>
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