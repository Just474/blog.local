<?php
$db = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT']."/function.php";
session_start();
adminPanelProtect();


$articles = $db->query("SELECT articles.*, categories.name as category_name FROM articles LEFT JOIN categories ON category_id = categories.id WHERE articles.is_moderated = 0")->fetchAll(PDO::FETCH_ASSOC);

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
<h1>Статьи</h1>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Заголовок</th>
        <th>Статья</th>
        <th>Создано</th>
        <th>Модерировано</th>
        <th>Категория</th>
    </tr>
    </thead>

    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article['id'] ?></td>
            <td><?= $article['name'] ?></td>
            <td><?= $article['text'] ?></td>
            <td><?= $article['created_at'] ?></td>
            <td><?= $article['is_moderated'] == 1 ? 'Да' : 'Нет' ?></td>
            <td><?= $article['category_name'] ?></td>
            <td><a href="edit.php?id=<?= $article['id'] ?>">|Модерировать|</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="../">|Вернуться|</a>
</body>
</html>
