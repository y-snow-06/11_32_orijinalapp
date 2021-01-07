<?php
//var_dump($_GET);
//exit();
//idをGETで取得する
$id = $_GET['id'];

//DB連携
include('functions.php');
$pdo = connect_to_db();

$sql = 'SELECT * FROM diary_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
//バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

//失敗時にはエラーを出力して、成功時には登録画面に戻る
if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 
  exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
  //var_dump($record);
  //exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nikki.css">
    <title>育成日記(編集画面)</title>
</head>
<body>
    <form action="todo_update.php" method="POST">
        <fieldset>
            <h1>記事投稿</h1>
            <a href="todo_read.php">過去の記録</a>

            <p>題名</p>
            <p><input type="text" name="title" size="40" value="<?= $record["title"] ?>"></p>
            <p>本文</p>
            <p><textarea name="diary" rows="8" cols="40"><?= $record["diary"] ?></textarea></p>
            <div>
            日付: <input type="date" name="DateCreated" value="<?= $record["DateCreated"] ?>">
            </div>
            <div>
            天気: <input type="text" name="weather" value="<?= $record["weather"] ?>">
            </div>
            　　　<input type="hidden" name="id" value="<?=$record['id']?>">
            <div>
                <button>投稿</button>
            </div>

        </fieldset>
    </form>
    
</body>
</html>