<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>ログイン</h1>
    </header>

    <main>
        <section class="login-form">
            <form method="POST" action="login_act.php">
                <div class="form-group">
                    <label for="lid">ユーザーID：</label>
                    <input type="text" name="lid" id="lid" required>
                </div>
                <div class="form-group">
                    <label for="lpw">パスワード：</label>
                    <input type="password" name="lpw" id="lpw" required>
                </div>
                <button type="submit">ログイン</button>
            </form>

            <!-- 新規ユーザー登録へのリンク -->
            <p>新規ユーザーの方は <a href="user_add.php">こちら</a> から登録してください。</p>
        </section>
    </main>

    <footer>
        <p>© 2024 COOPRO. All rights reserved.</p>
    </footer>
</body>
</html>
