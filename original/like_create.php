<?php
//var_dump($_GET);
//exit();


session_start();
include("functions.php");
check_session_id();

//ini_set("display_errors", 1);
//error_reporting(E_ALL);

$todo_id = $_GET['todo_id'];
$user_id = $_GET['user_id'];

// DB接続
$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM like_table_orijinal WHERE user_id=:user_id AND todo_id=:todo_id'; 

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT); 
$status = $stmt->execute();

if ($status == false) {

  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // エラー処理 } else {
$like_count = $stmt->fetch(); 
//var_dump($like_count[0]); 
//exit();
}
 // いいねしていれば削除，していなければ追加のSQLを作成 
 if ($like_count[0] != 0) {
  $sql = 'DELETE FROM like_table_orijinal WHERE user_id=:user_id AND todo_id=:todo_id';
} else {
  $sql = 'INSERT INTO like_table_orijinal(id, user_id, todo_id, created_at) VALUES(NULL, :user_id, :todo_id, sysdate())';
}

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:todo_read.php");
  exit();
}
