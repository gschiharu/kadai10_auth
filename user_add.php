<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規ユーザー追加</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar-brand">ユーザー管理システム</div>
        </nav>
    </header>

    <div class="login-container">
        <h1>新規ユーザー追加</h1>
        <form action="user_add_act.php" method="post">
            <input type="text" name="name" placeholder="ユーザー名" required><br>
            <input type="text" name="lid" placeholder="ログインID" required><br>
            <input type="password" name="password" placeholder="パスワード" required><br>
            <label>管理者フラグ:</label><br>
            <input type="radio" name="kanri_flg" value="0" required> 一般<br>
            <input type="radio" name="kanri_flg" value="1" required> 管理者<br>
            <input type="submit" value="ユーザー追加">
        </form>
    </div>

    <footer>
        <p>© 2024 ユーザー管理システム</p>
    </footer>
</body>
</html>
