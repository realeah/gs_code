<?php
//エラー詳細表示
ini_set( 'display_errors', 1 );
ini_set( 'error_reporting', E_ALL );

session_start();
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
include("funcs.php");
$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

$lpw = password_hash($lpw, PASSWORD_DEFAULT);


//2. DB接続します ここはほぼそのまま使う MAMPはid=root pass=root
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name,:lid,:lpw,:kanri_flg,:life_flg)";
// $sql = "INSERT INTO gs_user_table(,,indate)VALUES(:name,:lid,:lpw,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（idなど数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlError($stmt);
} else {

//５．index.phpへリダイレクト
header("Location: home.php");
exit;

}
?>