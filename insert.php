<?php
// 1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$skill = $_POST["skill"];
$experience = $_POST["experience"];
$appeal = $_POST["appeal"];

// 2. DB接続
include("funcs.php");
session_start();
sschk();          // ログインチェック
kanriCheck(); 

// 3. データ登録SQL作成
$sql = "INSERT INTO gs_profile_table(name, email, skill, experience, appeal, indate)
        VALUES(:name, :email, :skill, :experience, :appeal, sysdate())";
$stmt = $pdo->prepare($sql);

// 4. バインド変数に値をセット
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':skill', $skill, PDO::PARAM_STR);
$stmt->bindValue(':experience', $experience, PDO::PARAM_INT);
$stmt->bindValue(':appeal', $appeal, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

// 6. データ登録後の処理
if ($status === false) {
    sql_error($stmt);
} else {
    redirect("index.php");
}
?>

