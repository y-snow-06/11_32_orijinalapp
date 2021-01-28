<?php
session_start();
//functionsからデータベース接続をコピー（今までの接続文は削除）
include('functions.php');
check_session_id();

$user_id=$_SESSION['id'];

$pdo = connect_to_db();

// 参照はSELECT文!
//$sql = 'SELECT * FROM diary_table'; 

$sql = 'SELECT * FROM diary_table 
LEFT OUTER JOIN (SELECT todo_id, COUNT(id) AS cnt 
FROM like_table_orijinal GROUP BY todo_id) AS likes 
ON diary_table.id = likes.todo_id';


$stmt = $pdo->prepare($sql); 
$status = $stmt->execute();

if ($status==false) {
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {

    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  // fetchAll()関数でSQLで取得したレコードを配列で取得できる
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
  $output = "";

  foreach ($result as $record) {
  $output .= "<tr>";
  $output .= "<td>{$record["DateCreated"]}</td>"; 
  $output .= "<td>{$record["title"]}</td>"; 
  $output .= "<td>{$record["diary"]}</td>"; 
  $output .= "<td>{$record["weather"]}</td>"; 

  //edit deleteのリンクを追加
   $output .= "<td><a href='like_create.php?user_id={$user_id}&todo_id={$record["id"]}'>like{$record["cnt"]}</a></td>";
   $output .= "<td><a href='todo_edit.php?id={$record["id"]}'>edit</a></td>";
   $output .= "<td><a href='todo_delete.php?id={$record["id"]}'>delete</a></td>";
   $output .= "</tr>";

  } 
  // 今回は以降foreachしないので影響なし
  unset($value);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nikki.css">
    <title>DB連携型一覧画面</title>
</head>
<body>
    <form action="todo_input.php" method="POST">
        <fieldset>
        <legend>記事一覧</legend>
            <a href="todo_input.php">記事投稿画面</a>
            <a href="todo_logout.php">logout</a>
            <table>
             <thead>
            <tr>
             <th>DateCreated</th>
             <th>title</th>
             <th>diary</th>
             <th>weather</th>
        　　</tr>
      　　　　</thead>
      　　　<tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      　</tbody>
      </fieldset>
  </body>
  </html>
