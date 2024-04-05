<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>メモ帳アプリ</title>
  <link rel="stylesheet" href="enter.css">
</head>
<body>

<!-- Main[Start] -->
<div class="container form-container">
  <div class="form-wrapper">
    <h2 class="mb-4">メモ帳</h2>
    <form method="POST" action="insert.php">
      <div class="form-group">
        <input type="text" class="form-control" id="title" name="title" placeholder="タイトルを入力してください">
      </div>
      <div class="form-group">
        <textarea class="form-control" id="text" name="text" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">送信</button>
    </form>
  </div>
</div>

<div class="fixed-bottom d-flex justify-content-end p-3">
  <a href="select.php" class="btn btn-create">一覧を見る</a>
</div>
<!-- Main[End] -->


</body>
</html>
