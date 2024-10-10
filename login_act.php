<?php
session_start();
include("funcs.php");

// POSTデータ取得
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

// DB接続
$pdo = db_conn();

// データ取得SQL作成
$sql = "SELECT * FROM gs_user_table WHERE lid=:lid AND life_flg=0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

// SQL実行エラーのチェック
if($status == false) {
    sql_error($stmt);
}

// 抽出データ数を取得
$val = $stmt->fetch(); 

// 該当レコードがあればSESSIONに値を代入
if (password_verify($lpw, $val["lpw"])) {
    $_SESSION["chk_ssid"]  = session_id();
    $_SESSION["name"]      = $val['name'];
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    redirect("select.php");
} else {
    redirect("login.php");
}
?>

