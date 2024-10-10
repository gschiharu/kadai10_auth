<?php
session_start();
require_once('funcs.php');
sschk(); // セッションチェック

// POSTデータ取得
$name = isset($_POST['name']) ? $_POST['name'] : null;
$lid = isset($_POST['lid']) ? $_POST['lid'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$kanri_flg = isset($_POST['kanri_flg']) ? $_POST['kanri_flg'] : null;

// データが全て揃っているかチェック
if (!$name || !$lid || !$password || $kanri_flg === null) {
    exit('必須フィールドが入力されていません');
}

// DB接続
$pdo = db_conn();

// パスワードをハッシュ化
$lpw = password_hash($password, PASSWORD_DEFAULT);

// データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name, lid, lpw, kanri_flg, life_flg) VALUES (:name, :lid, :lpw, :kanri_flg, 0)";
$stmt = $pdo->prepare($sql);

// 値をバインド
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); // lidをバインド
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); // ハッシュ化されたパスワード（lpw）をバインド
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT); // 管理者フラグをバインド

// SQL実行
$status = $stmt->execute();

// エラー処理
if ($status === false) {
    sql_error($stmt); // SQLエラー時の処理
} else {
    redirect('login.php'); // 成功時にログイン画面へリダイレクト
}
