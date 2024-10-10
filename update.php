<?php
// 1. POSTデータ取得
$id         = $_POST["id"];
$name       = $_POST["name"];
$email      = $_POST["email"];
$skill      = $_POST["skill"];
$experience = $_POST["experience"];
$appeal     = $_POST["appeal"];

// 2. セッション開始 & ログインチェック
session_start();
include("funcs.php");
sschk();          // ログインチェック
kanriCheck();     // 管理者権限チェック

// 3. DB接続
$pdo = db_conn();

// 4. データ更新SQL作成
$sql = "UPDATE gs_profile_table SET name=:name, email=:email, skill=:skill, experience=:experience, appeal=:appeal WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':skill', $skill, PDO::PARAM_STR);
$stmt->bindValue(':experience', $experience, PDO::PARAM_INT);
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute(); // 実行

// 5. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
?>

