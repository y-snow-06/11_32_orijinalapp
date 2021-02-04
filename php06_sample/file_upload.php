<?php
//var_dump($_FILES);
//exit();
if(!isset($_FILES['upfile']) && $_FILES['upfile']['error'] != 0){
  // 送られていない，エラーが発生，などの場合
 exit('Error:画像が送信されていません');
}else{
  $uploaded_file_name = $_FILES['upfile']['name']; //ファイル名の取得
  $temp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダの場所
  $directory_path = 'upload/'; //アップロード先ォルダ

  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION); 
  $unique_name = date('YmdHis').md5(session_id()) . "." . $extension; 
  $filename_to_save = $directory_path . $unique_name;
  //var_dump($filename_to_save);
  //exit();
 if(!is_uploaded_file($temp_path)) {
  exit('画像がないです');
 } else {
  if (!move_uploaded_file($temp_path, $filename_to_save)){
    exit('アップロードに失敗しました');
  }else{
    chmod($filename_to_save,0644);
    $img = "<img src={$filename_to_save}>";
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>file_upload</title>
</head>

<body>
  <!-- ここに画像を表示しよう -->
  <?= $img ?>
</body>

</html>