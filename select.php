<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=mari-nakamura_gs_kadai;charset=utf8;host=mysql647.db.sakura.ne.jp','mari-nakamura',''); //最後はさくらサーバーのパスワード入れる（自分で決めたやつ。いつも使ってるやつ）
} catch (PDOException $e) {
  exit('DB_CONECT'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM memo_an_table ORDER BY id DESC";
$stmt = $pdo->prepare("$sql");
$status = $stmt->execute(); //true or false

//３．データ表示
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="display.css">
<title>メモ表示</title>
</head>
<body id="main">

<!-- Main[Start] -->
<div class="container mt-5">
  <h2 class="mb-4">メモ一覧</h2>
  <div class="row">
    <?php foreach($values as $value){ ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?=$value["title"]?></h5>
          <p class="card-text"><?=$value["text"]?></p>
          <p class="card-text"><small class="text-muted"><?=$value["indate"]?></small></p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<div class="fixed-bottom d-flex justify-content-end p-3">
  <a href="index.php" class="btn btn-create">新しく作成する</a>
</div>
<!-- Main[End] -->

</body>
</html>