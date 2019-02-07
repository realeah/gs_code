<?php
session_start();
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a,ENT_QUOTES);
}

//DB接続
function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost','root','root');
        return $pdo; //functionから外に出すためにreturn
    } catch (PDOException $e) {
        exit('DB-Connection-Error:'.$e->getMessage());  //エラー出た時の処理 エラーメッセージは本番は出さない
    }
}

function sqlError($stmt){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]); //2は英語のメッセージ
  }

//全ての処理が終わった後別のページに飛ぶ
  function redirect($page){
    header("Location: ".$page);
    exit;
    }

//idが特定できない人はログインできないようにする 
function sessChk(){
    if(!isset($_SESSION["chk_ssid"]) ||
        $_SESSION["chk_ssid"]!=session_id()){
        exit("error");

        // echo $_SESSION["chk_ssid"]."<br>";
        // echo session_id();

    }else{
        session_regenerate_id(true); //trueは必ず入れる
        $_SESSION["chk_ssid"]=session_id();

        // echo $_SESSION["chk_ssid"]."<br>";
        // echo session_id();
    }

}



