<?php
include("funcs.php");
sschk();

// POSTデータ取得
$id = $_POST["id"];
$name = $_POST["name"];
$lid = $_POST["lid"];
$kanri_flg = $_POST["kanri_flg"];

// DB接続
$pdo = db_conn();

// データ更新SQL作成
$sql = "UPDATE gs_user_table SET name=:name, lid=:lid, kanri_flg=:kanri_flg WHERE id=:id";
$stmt = $pdo->prepare($sql);

// バインド変数に値をセット
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 実行
$status = $stmt->execute();

// 更新後の処理
if ($status === false) {
    sql_error($stmt);
} else {
    redirect("user_select.php");
}
?>
