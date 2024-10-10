<?php
session_start(); // セッション開始

// セッション変数を空にする
$_SESSION = array();

// クッキーにセッションIDが設定されている場合、それも削除
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// セッションを破棄
session_destroy();

// ログイン画面にリダイレクト
header("Location: login.php");
exit();
?>