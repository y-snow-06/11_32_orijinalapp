<?php
//var_dump($_POST);
//exit();
ini_set("display_errors", 1);
error_reporting(E_ALL);


$id = $_POST['id'];

// 受け取ったデータを変数に入れる
$title = $_POST['title']; 
$diary = $_POST['diary'];
$DateCreated = $_POST['DateCreated'];
$weather = $_POST['weather'];

//functionsからデータベース接続をコピー（今までの接続文は削除）

include('functions.php');
$pdo = connect_to_db();

//SQL作成＆実行
$sql = 'UPDATE diary_table SET title=:title, diary=:diary, DateCreated=:DateCreated, updated_at=sysdate(), weather=:weather WHERE id=:id';


$stmt = $pdo->prepare($sql);
//バインド変数を設定
$stmt->bindValue(':title', $title, PDO::PARAM_STR); 
$stmt->bindValue(':diary', $diary, PDO::PARAM_STR); 
$stmt->bindValue(':DateCreated', $DateCreated, PDO::PARAM_STR); 
$stmt->bindValue(':weather', $weather, PDO::PARAM_STR); 
$stmt->bindValue(':id', $id, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

//失敗時にはエラーを出力して、成功時には登録画面に戻る
if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 
  exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
  header('Location:todo_read.php'); 
  exit();
}