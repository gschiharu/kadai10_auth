<?php
// XSS対応（ echoする場所で使用、それ以外ではNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続関数

function db_conn(){
  try {
      $db_name = "gs_db";    // データベース名
      $db_id   = "root";      // アカウント名
      $db_pw   = "";          // パスワード：XAMPPはパスワード無し
      $db_host = "localhost"; // DBホスト
      return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
  } catch (PDOException $e) {
    exit('DB Connection Error:'.$e->getMessage());
  }
}


// SQLエラー関数
function sql_error($stmt){
    // SQL実行時にエラーがある場合
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

// リダイレクト関数
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}

// セッションチェック関数
function sschk(){
  // セッションの確認と再生成
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()){
    exit("Login Error");
  } else {
    session_regenerate_id(true); // セッションIDを再生成
    $_SESSION["chk_ssid"] = session_id();
  }
}

// 管理者権限チェック関数
function kanriCheck(){
    // 管理者かどうかを確認
    if ($_SESSION['kanri_flg'] != 1) {
        exit('権限がありません'); // 管理者フラグが0ならば権限エラー
    }
}







