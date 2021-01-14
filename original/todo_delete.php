<?php
//var_dump($_GET);
//exit();
session_start();
$id = $_GET['id'];

//DB連携
include('functions.php');
check_session_id();
$pdo = connect_to_db();

$sql = 'DELETE FROM diary_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
//バインド変数を設定
$stmt->bindValue(':id', $id, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

//失敗時にはエラーを出力して、成功時には登録画面に戻る
if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 登録ページへ移動
  header('Location:todo_read.php');
  //var_dump($record);
  //exit();
}

?>