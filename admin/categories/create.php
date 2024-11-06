<?php
require_once $_SERVER['DOCUMENT_ROOT']."/function.php";
session_start();
adminPanelProtect();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="actions/store.php" method="post">
    <input type="text" placeholder="Введите название категории" name="name">
    <input type="submit" value="Добавить">
</form>
</body>
</html>


