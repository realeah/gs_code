<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$url = $_POST["url"];
$naiyou = $_POST["naiyou"];
$id = $_POST["id"];


//2. DB接続します ここはほぼそのまま使う MAMPはid=root pass=root
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET name=:name,url=:url,naiyou=:naiyou WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（idなど数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlError($stmt);
}else{

//５．index.phpへリダイレクト
 header("Location: select.php");
 exit;

}
?>