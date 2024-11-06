<?php
    require_once "../function.php";
    require_once "../db.php";
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
<a href="categories/">Категории</a>
<a href="articles">Статьи</a>
</body>
</html>
