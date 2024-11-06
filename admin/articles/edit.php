<?php
$db = require_once  $_SERVER['DOCUMENT_ROOT'] . "/db.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/function.php";
session_start();
adminPanelProtect();
$id = $_GET['id'];

$article = $db->query("SELECT articles.*, categories.name as category_name FROM articles LEFT JOIN categories ON category_id = categories.id WHERE articles.id =" .$id)->fetch(PDO::FETCH_ASSOC);
?>
<h1>Отмодерировать</h1>
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

    <tr>
        <td><?= $article['id'] ?></td>
        <td><?= $article['name'] ?></td>
        <td><?= $article['text'] ?></td>
        <td><?= $article['created_at'] ?></td>
        <td><?= $article['is_moderated'] == 1 ? 'Да' : 'Нет' ?></td>
        <td><?= $article['category_name'] ?></td>
    </tr>
</table>
<h3>Разрешить публикацию:</h3>
<form action="actions/update.php" method="post">
    <input type="hidden" name="id" value="<?=$id ?>">
    <input type="checkbox" name="is_moderated" value="1" <?= $article['is_moderated'] == 1 ? 'checked' : '' ?>>
    <input type="submit">
</form>
