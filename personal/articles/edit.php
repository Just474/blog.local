<?php
$db = require_once $_SERVER['DOCUMENT_ROOT'].'/db.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/function.php';
session_start();
userVerification();
$categories = $db->query("SELECT * FROM categories")->fetchall(PDO::FETCH_ASSOC);
$id = $_GET['id'];
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
<form action="actions/update.php" method="post">
    <input type="text" required name="title" placeholder="Введите название статьи">
    <input type="text" required name="text" placeholder="Введите содержимое статьи">
    <input type="hidden" name="id" value="<?=$id?>"  >
    <select name="category"  required>
        <option value="" selected >Выберите категорию</option>
        <?php foreach ($categories as $category):?>
            <option value="<?=$category['id']?>"><?=$category['name']?></option>
        <?php endforeach;?>
    </select>
    <input type="submit">
</form>
</body>
</html>
