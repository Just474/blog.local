<?php
    $db = require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
    require_once $_SERVER['DOCUMENT_ROOT']."/function.php";
    session_start();
    adminPanelProtect();

    $users = $db->query("SELECT * FROM categories ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
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
<a href="../">Веорнуться назад</a>
<a href="create.php">добавить запись</a>
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
         <?php foreach ($users as $user):?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['name']?></td>
            <td><a href="actions/delete.php?id=<?=$user['id']?>">Удалить</a></td>
            <td><a href="edit.php?id=<?=$user['id']?>">обновить</a></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>

