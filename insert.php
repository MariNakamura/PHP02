<?php
//1. POSTデータ取得
$title = $_POST["title"];
$text = $_POST["text"];

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=mari-nakamura_gs_kadai;charset=utf8;host=mysql647.db.sakura.ne.jp','mari-nakamura',''); //最後はさくらサーバーのパスワード入れる（自分で決めたやつ。いつも使ってるやつ）
} catch (PDOException $e) {
  exit('DB_ERROR:'.$e->getMessage());
}


//３．データ登録SQL作成
$sql = "INSERT INTO memo_an_table(id,title,text,indate)VALUES(NULL,:title,:text,sysdate());";
$stmt = $pdo->prepare($sql); //ここまではとりあえず暗記
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', $text, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or falseが返る

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL:ERROR:".$error[2]); //エラーメッセージ
}else{
  //５．リダイレクト
  header("Location: select.php");
  exit();


}
?>
