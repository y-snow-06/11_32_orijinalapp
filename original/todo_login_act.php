<?php
// var_dump($_POST);
// exit();


session_start();
include('functions.php');
$pdo = connect_to_db();
$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'SELECT * FROM users_table_orijinal
WHERE username=:username
AND password=:password
AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR); 
$stmt->bindValue(':password', $password, PDO::PARAM_STR); //数字の場合はSTR→INGとなる
$status = $stmt->execute();

//失敗時にはエラーを出力して、成功時には登録画面に戻る
if ($status==false) {
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    $val = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$val) { // 該当データがないときはログインページへのリンクを表示
        echo "<p>ログイン情報に誤りがあります.</p>"; 
        echo '<a href="todo_login.php">login</a>'; 
        exit();
 }else {
    $_SESSION = array(); // セッション変数を空にする 
    $_SESSION["session_id"] = session_id();
    $_SESSION["is_admin"] = $val["is_admin"]; 
    $_SESSION["username"] = $val["username"]; 
    header("Location:todo_input.php"); // 一覧ページへ移動 
    exit();
  }

}