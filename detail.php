<?php
// セッションスタート
session_start();

// 1. GETデータ取得
$id = $_GET["id"];

// 2. DB接続
include("funcs.php");
sschk();
$pdo = db_conn();

// 3. データ取得SQL作成
$sql = "SELECT * FROM gs_profile_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ表示
if($status == false) {
    sql_error($stmt);
} else {
    $v = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>メンバー更新</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <header>
    <nav>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="select.php">メンバー一覧</a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section class="update-form">
      <h1>メンバー更新フォーム</h1>
      <form method="POST" action="update.php">
        <div class="form-group">
          <label for="name">名前：</label>
          <input type="text" name="name" id="name" value="<?= htmlspecialchars($v["name"]) ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email：</label>
          <input type="email" name="email" id="email" value="<?= htmlspecialchars($v["email"]) ?>" required>
        </div>
        <div class="form-group">
          <label for="skill">専門分野：</label>
          <select name="skill" id="skill">
            <option value="プロジェクトマネージメント" <?= $v["skill"] == "プロジェクトマネージメント" ? "selected" : "" ?>>プロジェクトマネージメント</option>
            <option value="通訳" <?= $v["skill"] == "通訳" ? "selected" : "" ?>>通訳</option>
            <option value="翻訳" <?= $v["skill"] == "翻訳" ? "selected" : "" ?>>翻訳</option>
          </select>
        </div>
        <div class="form-group">
          <label for="experience">経験年数：</label>
          <input type="number" name="experience" id="experience" value="<?= htmlspecialchars($v["experience"]) ?>" required>
        </div>
        <div class="form-group">
          <label for="appeal">スキルアピール：</label>
          <textarea name="appeal" id="appeal" rows="4" cols="50" required><?= htmlspecialchars($v["appeal"]) ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?= htmlspecialchars($v["id"]) ?>">
        <button type="submit">更新</button>
      </form>
    </section>
  </main>

  <footer>
    <p>© 2024 COOPRO. All rights reserved.</p>
  </footer>
</body>
</html>
