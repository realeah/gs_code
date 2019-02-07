<?php
$id = $_GET["id"];



//2. DB接続します ここはほぼそのまま使う MAMPはid=root pass=root
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "DELETE FROM gs_bm_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
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