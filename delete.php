<?php
// 1. GETデータ取得
$id = $_GET["id"];

// 2. DB接続
include("funcs.php");
session_start();
sschk();          // ログインチェック
kanriCheck();     // 管理者権限チェック

$pdo = db_conn();

// 3. データ削除SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_profile_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  // idをバインド
$status = $stmt->execute();

// 4. 削除処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
