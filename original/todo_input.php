<?php
session_start(); 
include('functions.php'); 
check_session_id();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nikki.css">
    <title>育成日記</title>
</head>
<body>
    <form action="todo_create.php" method="POST">
        <fieldset>
            <h1>記事投稿</h1>
            <a href="todo_read.php">過去の記録</a>
            <a href="todo_logout.php">logout</a>

            <p>題名</p>
            <p><input type="text" name="title" size="40" value=""></p>
            <p>本文</p>
            <p><textarea name="diary" rows="8" cols="40"></textarea></p>
            <div>
            日付: <input type="date" name="DateCreated">
            </div>
            <div>
            天気: <input type="text" name="weather">
            </div>
            <div>
                <button>投稿</button>
            </div>

        </fieldset>
    </form>
    
</body>
</html>