<?php
$db = require_once $_SERVER ["DOCUMENT_ROOT"] . "/db.php";
require_once $_SERVER ['DOCUMENT_ROOT'] . "/function.php";
session_start();
userVerification();
$user_id = $_SESSION["user_id"];

$myArticles = $db->query("SELECT articles.*, categories.name as category_name  FROM articles LEFT JOIN categories  ON category_id = categories.id  WHERE user_id = '$user_id' " )->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Мои статьи</h1>
    <a href="create.php">Добавить запись</a>
    <?php foreach ($myArticles as $myArticle):?>
    <div class="categories">
        <h2><?=$myArticle['name']?></h2>
        <h3><?=$myArticle['category_name']?></h3>
        <p><?=$myArticle['text']?></p>
        <p><?=$myArticle['created_at']?></p>
        <p>Модерация:<?=$myArticle['is_moderated']==1 ? "Пройдена" : "Не пройдена"?></p>
        <div class="action_container">
            <a href="actions/delete.php?id=<?=$myArticle['id']?>">Удалить запись</a>
            <a href="edit.php?id=<?=$myArticle['id']?>">Изменить пост</a>
        </div>
    </div>
    <?php endforeach;?>
    <a href="../">Назад</a>
</body>
</html>
