<?php
//var_dump($_POST);
//exit();
//エラーチェック
session_start(); 
include('functions.php'); 
check_session_id();

ini_set("display_errors", 1);
error_reporting(E_ALL);

//空欄はエラーにする
//if (
//  !isset($_POST['title']) || $_POST['title']=='' ||
//  !isset($_POST['diary']) || $_POST['diary']=='' ||
//  !isset($_POST['DateCreated']) || $_POST['DateCreated']=='' ||
//  !isset($_POST['weather']) || $_POST['weather']=='' ){
//  exit('ParamError'); 
//}
//定数に格納
$title = $_POST['title']; 
$diary = $_POST['diary'];
$DateCreated = $_POST['DateCreated'];
$weather = $_POST['weather'];

//functionsからデータベース接続をコピー（今までの接続文は削除）

//include('functions.php');
$pdo = connect_to_db();

//SQL作成＆実行
$sql = 'INSERT INTO diary_table(id, title, diary, DateCreated, created_at, updated_at, weather) VALUES(NULL, :title, :diary, :DateCreated, sysdate(), sysdate(), :weather)';


$stmt = $pdo->prepare($sql);
//バインド変数を設定
$stmt->bindValue(':title', $title, PDO::PARAM_STR); 
$stmt->bindValue(':diary', $diary, PDO::PARAM_STR); 
$stmt->bindValue(':DateCreated', $DateCreated, PDO::PARAM_STR); 
$stmt->bindValue(':weather', $weather, PDO::PARAM_STR); 
$status = $stmt->execute(); // SQLを実行

//失敗時にはエラーを出力して、成功時には登録画面に戻る
if ($status==false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 
  exit('sqlError:'.$error[2]);
  } else {
  // 登録ページへ移動
  header('Location:todo_input.php'); 
  exit();
}
?>